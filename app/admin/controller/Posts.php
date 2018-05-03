<?php
namespace app\admin\controller;
use think\Db;
use think\Validate;

/**
 * 文章,文章分类
 */
class Posts extends Base
{
    /*=====================================文章页面==============================*/
    function home_page_posts()
    {
        $postsListNums = Db::name('posts')
            ->where('post_type', 1)
            ->count();
        $pagesClass = new \Page($postsListNums);
        $postsList = Db::name('posts')
            ->where('post_type', 1)
            ->order('id desc')
            ->epage()
            ->select();

        $postsMap = [
            'postsList' => $postsList,
            'pages' => $pagesClass->showPages(3),
            'postsListNums' => $postsListNums
        ];

        $termsList = Db::name('terms')->select();//内容分类列表
        $termsList = menu_left($termsList, 'term_id', 'path');
        $postsMap['termsList'] = $termsList;

        return view('home_page_posts',$postsMap);
    }

    function add_think_posts()
    {
        $validate = new Validate([
            ['smeta.term_relation', 'require', '文章分类必须填写'],
            ['post_title', 'require|unique:posts|max:255', '文章标题必须填|文章标题重复|标题最多不能超过25个字符'],
            ['post_excerpt', 'require|min:25', '文章摘要必须填|文章摘要最多最少25个字符'],
//            ['post_content', 'require', '文章内容不能为空']
        ]);

        if (!$validate->check($_POST))
            $this->error($validate->getError());
        $postMap = $_POST;
        $postMap['post_date'] = time();//发布时间

        $postMap['smeta']['term_relation'] = implode(',', $_POST['smeta']['term_relation']);
        $postMap['smeta'] = json_encode($postMap['smeta']);//附加属性，缩略图，附件，模板

        $postMap['post_author'] = open_secret(cookie('UID'));

            if ($post_id = Db::name('posts')->insertGetId($postMap)) {
                foreach ($_POST['smeta']['term_relation'] as $k => $v) {
                    $relateMap[$k] = [
                        'object_id' => $post_id,
                        'term_id' => $v,
                    ];
                }
                if (Db::name('term_relationships')->insertAll($relateMap)) {
                    //添加文章分类对应表
                    $this->success('文章发布成功');
                } else {
                    $this->error('文章发布失败');
                }
            }else{
                $this->error('文章发布失败');
            }
    }

    function del_think_posts()
    {
        $term_relate = [
            'object_id'=>input('id')
        ];
        $terms_relates = Db::name('term_relationships')
            ->where($term_relate)
            ->select();

        foreach ($terms_relates as $k=>$v){
            $del_arr[$k] = $v['tid'];
        }
        $del_arr = !empty($del_arr) ? $del_arr : 0;
        Db::name('posts')->delete(input('id'));
        Db::name('term_relationships')->delete($del_arr);
        $this->success('删除该文章成功');
    }

    function edit_page_posts()
    {
        $postsOne = Db::name('posts')->find(input('id'));

        $postsMap['term_relation'] = getAttr($postsOne['smeta'], 'term_relation');//所属内容分类明细
        $termsList = Db::name('terms')->select();//内容分类列表
        $termsList = menu_left($termsList, 'term_id', 'path');
        $postsMap['termsList'] = $termsList;
        $postsMap = array_merge($postsOne, $postsMap);
        return view('edit_page_posts', $postsMap);
    }

    function edit_think_posts()
    {
        $validate = new Validate([
            ['smeta.term_relation', 'require', '文章分类必须填写'],
            ['post_title', 'require|unique:posts|max:255', '文章标题必须填|文章标题重复|标题最多不能超过25个字符'],
            ['post_excerpt', 'require|min:25', '文章摘要必须填|文章摘要最多最少25个字符'],
//            ['post_content', 'require', '文章内容不能为空']
        ]);

        if (!$validate->check($_POST)) {
            $this->error($validate->getError());
        } else {
            $postMap = $_POST;
            $post_date =time();
            $postMap['post_date'] = $post_date;//发布时间

            $postMap['smeta']['term_relation'] = implode(',', $_POST['smeta']['term_relation']);
            $postMap['smeta'] = json_encode($postMap['smeta']);//附加属性，缩略图，附件，模板

            if (!input('?post_status')) {
                $postMap['post_status'] = input('post_status')?input('post_status'):0;
            }
            $postMap['post_type'] = 1;//文章

                if (Db::name('posts')->update($postMap)) {
                    if (Db::name('term_relationships')->where('object_id', input('id'))->delete()) {
                        foreach ($_POST['smeta']['term_relation'] as $k => $v) {
                            $relateMap[$k] = [
                                'object_id' => input('id'),
                                'term_id' => $v,
                            ];
                        }
                        if (Db::name('term_relationships')->insertAll($relateMap)) {
                            //添加文章分类对应表
                            $this->success('文章修改成功');
                        } else {
                            $this->error('文章修改失败');
                        }
                    } else {
                        $this->error('文章修改失败');
                    }
                }else{
                    $this->error('文章修改失败');
                }

        }
    }
    /*=====================================文章分类页面==============================*/
    function home_page_term()
    {
        $termsList = Db::name('terms')->select();//内容分类列表
        $termsList = menu_left($termsList, 'term_id', 'path');

        $termsNums = Db::name('terms')->count();//内容总个数

        $termMap = [
            'termList'=>$termsList,
            'termNums'=>$termsNums
        ];
        return view('home_page_term',$termMap);
    }

    function add_think_term()
    {
        $validate = new Validate([
            ['name','require|unique:terms|max:25', '分类名称必填|名称最多不能超过25个字符']
        ]);

        if (!$validate->check($_POST)) {
            $this->error($validate->getError());
        }

        if (Db::name('terms')->insert($_POST)) {
            $this->success('内容分类添加成功');
        } else {
            $this->error('内容分类添加失败');
        }
    }

    function del_think_term()
    {

        $childs = Db::name('terms')->where('path', input('term_id'))->count();
        if ($childs) {
            $this->error('该类别下面存在子级');
        } else {
            if (Db::name('terms')->delete(input('term_id'))) {
                $this->success('该分类删除成功');
            }else{
                $this->error('该分类删除失败');
            }
        }
    }

    function edit_page_term()
    {
        $termsOne = Db::name('terms')->find(input('term_id'));

        $termsList = Db::name('terms')->select();//内容分类列表
        $termsList = menu_left($termsList, 'term_id', 'path');

        $termMap = [
            'termList'=>$termsList,
        ];
        $termMap = array_merge($termsOne, $termMap);
        return view('edit_page_term', $termMap);
    }

    function edit_think_term()
    {
        $validate = new Validate([
            ['name', 'unique:terms|max:25', '分类名称重复|名称最多不能超过25个字符']
        ]);
        if (!$validate->check($_POST)) {
            $this->error($validate->getError());
        } else {
            if (Db::name('terms')->update($_POST)) {
                $this->success('编辑分类修改成功');
            } else {
                $this->error('编辑分类未做任何修改');
            }
        }
    }
}