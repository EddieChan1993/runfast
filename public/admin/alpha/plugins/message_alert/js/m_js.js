	var tips = document.querySelectorAll(".m_tip");
	/**
	 *	message方法调用
	 *		type        string类型       表示提示的类型  
	 *		callback 	回调函数
	 *		is_close    Boolean类型      true表示有关闭按钮
	 *		top         Number类型       提示出现的高度
	 *		time 		Number类型	　　 提示存在的毫秒数
	 *		msg 		string类型		 提示的内容
	 ***/
	function message(type,callback,is_close,top,time,msg){
		var m = new Message(type,callback,is_close,top,time,msg);
		m.construct();
		tips = document.querySelectorAll(".m_tip");
		//鼠标进入元素时不会自动消失, 鼠标离开后1s 元素消失
		for(var i=0,len=tips.length; i<len; i++){
			tips[i].onmouseenter = function(){
				this.value = "stop";
			}
			tips[i].onmouseleave = function(){
				var that = this;
				setTimeout(function(){
					that.value = "stop";
					that.style.top = "-30px";
					that.style.opacity = "0";
				},1000)
				setTimeout(function(){
					that.remove();
					destroy_tip(that);
					callback();
				},2000)
			}
		}
		m.in();
	}
	//构造方法
	function Message (type,callback,is_close,top,time,msg) {
		this.config = {
			type:type,
			is_close:is_close,
			top:top,
			time:time,
			msg:msg
		}

		//新组件
		this.ele = null;

		/**
		 *	消息条进入
		 *
		 ***/
		this.in=function(){
			this.ele.style.top = "-30px";
			this.ele.style.opacity = "0";
			var that = this;
			setTimeout(function(){
				that.ele.style.top = that.config.top + "px";
				that.ele.style.opacity = "1";
			},10)
			setTimeout(function(){
				if(that.ele.value == "stop"){
					return;
				}
				that.ele.style.top = "-30px";
				that.ele.style.opacity = "0";
				if(that.config.time == -1){return}
				setTimeout(function(){
					that.ele.remove();
					destroy_tip(that);
					callback();
				},500)
			},that.config.time)

		},
		/**
		 *	构造函数
		 *		生成默认组件
		 *
		 *
		 ***/
		this.eles = document.querySelector(".m_tip");
		this.construct=function(){
			this.ele = this.eles.cloneNode(true);
			this.ele.style.display = "block";
			switch(this.config.type){
				case "normal":
					this.ele.children[0].children[0].style.display = "inline-block";
					break;
				case "error":
					this.ele.children[0].children[1].style.display = "inline-block";
					break;
				case "success":
					this.ele.children[0].children[2].style.display = "inline-block";
					break;
				case "warning":
					this.ele.children[0].children[3].style.display = "inline-block";
					break;
				case "loading":
					this.ele.children[0].children[4].style.display = "inline-block";
					break;
			}
			if(this.config.is_close == true){
				this.ele.children[1].style.display = "inline-block";
			}
			this.ele.children[0].children[5].innerText = this.config.msg;
			document.body.appendChild(this.ele);
			this.ele.style.right = "calc(50% - "+this.ele.offsetWidth/2+"px)";
		}
	}
	//关闭
	function close_tip(ele){
		ele.parentNode.style.top = "-30px";
		ele.parentNode.style.opacity = "0";
		setTimeout(function(){
			destroy_tip(ele.parentNode);
		},500)
	}
	//销毁
	function destroy_tip(ele){
		ele = null;
	}


	//销毁所有
	function destory(){
		var m_tips = document.querySelectorAll(".m_tip");
		for(var i=0,len=m_tips.length;i<len;i++){
				m_tips[i].style.top = "-30px";
				m_tips[i].style.opacity = "0";
				setTimeout(function(){
					destroy_tip(m_tips[i]);
				},500)
		}
	}
	/*
	 *	回调函数实例
	 *		string类型	提示内容
	 *		function	回调函数
	 *		obj			配置	
	 */
	var haha = function(){
		m_normal("你好",function(){
			console.log(1)
		},{})
	}

	
	function m_callback(){
		console.log("该元素已摧毁!");
	}
	function m_normal(msg,obj,callback) {
		if(obj == undefined){ obj = {}};
		message("normal", callback?callback:m_callback, obj.is_close?obj.is_close:false, obj.top?obj.top:"27", obj.time?obj.time:"2000", msg?msg:"一个普通提示")
	}
	function m_error(msg,obj,callback){
		if(obj == undefined){ obj = {}};
		message("error", callback?callback:m_callback, obj.is_close?obj.is_close:false, obj.top?obj.top:"27", obj.time?obj.time:"2000", msg?msg:"一个错误提示")
	}
	function m_success(msg,obj,callback){
		if(obj == undefined){ obj = {}};
		message("success", callback?callback:m_callback, obj.is_close?obj.is_close:false, obj.top?obj.top:"27", obj.time?obj.time:"2000", msg?msg:"一个成功提示")
	}
	function m_warning(msg,obj,callback){
		if(obj == undefined){ obj = {}};
		message("warning", callback?callback:m_callback, obj.is_close?obj.is_close:false, obj.top?obj.top:"27", obj.time?obj.time:"2000", msg?msg:"一个警告提示")
	}
	function m_loading(msg,obj,callback){
		if(obj == undefined){ obj = {}};
		message("loading", callback?callback:m_callback, obj.is_close?obj.is_close:false, obj.top?obj.top:"27", obj.time?obj.time:"2000", msg?msg:"一个加载提示")
	}
	function m_unclose(msg,obj,callback){
		if(obj == undefined){ obj = {}};
		message("normal", callback?callback:m_callback, obj.is_close?obj.is_close:true, obj.top?obj.top:"27", obj.time?obj.time:"-1", msg?msg:"一个加载提示")
	}
	
	
	
	