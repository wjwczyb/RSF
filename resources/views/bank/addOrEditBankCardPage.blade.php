<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>增加银行卡</title>
		<link href="{{ asset('AmazeUI/css/amazeui.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="{{asset('AmazeUI/css/admin.css')}}">
		<link rel="stylesheet" href="{{asset('AmazeUI/css/amazeui.address.min.css')}}"/>
		<link rel="stylesheet" href="{{asset('amazeuiUpload/dist/amazeui.upload.css')}}"/>
		<link rel="stylesheet" type="text/css" href="{{asset('uploadify/uploadify.css')}}" />
		<script src="{{ asset('AmazeUI/js/jquery.min.js') }}"></script>
		<script src="{{ asset('AmazeUI/js/amazeui.js') }}"></script>
		<script src="{{ asset('AmazeUI/js/iscroll.min.js')}}"></script>
		<script src="{{ asset('AmazeUI/js/address.min.js') }}"></script>
		<script src="{{ asset('AmazeUI/js/app.js')}}"></script>
		<script src="{{ asset('layer/layer.js')}}"></script>
		
		<script src="{{ asset('photoClip-master/dist/iscroll-zoom.min.js')}}"></script> 
		<script src="{{ asset('photoClip-master/dist/hammer.min.js')}}"></script> 
		<script src="{{ asset('photoClip-master/dist/photoClip.min.js')}}"></script>
		<script type="text/javascript" src="{{ asset('uploadify/jquery.uploadify.min.js')}}"></script>
		<!-- Ueditor的相关调用 -->
	 	<link href="{{asset('Ueditor/themes/default/css/umeditor.css')}}" type="text/css" rel="stylesheet">
	    <!-- <script type="text/javascript" src="third-party/jquery.min.js"></script> -->
	    <script type="text/javascript" charset="utf-8" src="{{asset('Ueditor/umeditor.config.js')}}"></script>
	    <script type="text/javascript" charset="utf-8" src="{{asset('Ueditor/umeditor.min.js')}}"></script>
	    <script type="text/javascript" src="{{ asset('Ueditor/lang/zh-cn/zh-cn.js')}}"></script>
		
		<style type="text/css">
			#clip {
				width: 100%;
				height: 400px;
			}
		</style>
	</head>
	<body>
		<div class="am-cf admin-main">
			<!-- content start -->
			<div class="admin-content">
				<div class="admin-content-body">
					<div class="am-cf am-padding"></div>
					<div class="am-g">
						<div class="am-u-sm-12">
							<form class="am-form am-form-horizontal" action="/bank/addBankCard" method="get">
								<input type="hidden" name='bankCardId' value='{{$bankCard->id}}'>
								<div class="am-form-group">
									<label class="am-u-sm-12 am-u-md-2 am-form-label">银行卡名称</label>
									<div class="am-u-sm-12 am-u-md-10">
										<input type="text" class="am-input-sm"   name='card_name' placeholder="请输入银行卡名称" value="{{$bankCard->card_name}}">
									</div>
								</div>


								
								<div class="am-form-group">
									<label class="am-u-sm-12 am-u-md-2 am-form-label">银行卡类型</label>
									<div class="am-u-sm-12 am-u-md-10">
										<select name="card_type" data-am-selected>
											<option value="1" {{$bankCard->card_type=="1"?"selected":""}}>借记卡</option>
											<option value="2"{{$bankCard->card_type=="2"?"selected":""}}>信用卡</option>
											<option value="3"{{$bankCard->card_type=="3"?"selected":""}}>社保卡</option>
											<option value="4"{{$bankCard->card_type=="4"?"selected":""}}>其它</option>
										</select>
									</div>
								</div>
								<div class="am-form-group">
									<label class="am-u-sm-12 am-u-md-2 am-form-label">发行银行</label>
									<div class="am-u-sm-12 am-u-md-10">
										<select name="card_bank" data-am-selected>
											@foreach ($banks as $bank)
											<option value="{{$bank->id}}">{{$bank->bank_name}}</option>
											@endforeach
											<!-- <option value="1"{{$bankCard->card_bank=="1"?"selected":""}}>国有银行</option>
											<option value="2"{{$bankCard->card_bank=="2"?"selected":""}}>农商行</option>
											<option value="3"{{$bankCard->card_bank=="3"?"selected":""}}>民营银行</option>
											<option value="4"{{$bankCard->card_bank=="4"?"selected":""}}>农村信合</option>
											<option value="5"{{$bankCard->card_bank=="5"?"selected":""}}>外资银行</option> -->
										</select>
									</div>
								</div>
								<div class="am-form-group">
									<label class="am-u-sm-12 am-u-md-2 am-form-label">图片上传</label>
									<div class="am-u-sm-12 am-u-md-10">
										<input type="file" id="card_logo">
										<input type="hidden" name="card_logo">
									</div>
								</div>
								<div class="am-form-group">
									<label for="user-weibo" class="am-u-sm-12 am-u-md-2 am-form-label">银行卡详细信息</label>
									<div class="am-u-sm-12 am-u-md-10">
										<input type="hidden" name="card_info" value=''/>
										<script type="text/plain" id="myEditor" style="width:1000px;height:240px;">
										    <p></p>
										</script>
									</div>
								</div>
								
								{{ csrf_field() }}
								
								<div class="am-form-group">
									<div class="am-u-sm-12 am-u-md-10 am-u-md-push-2">
										<button type="submit" class="am-btn am-btn-primary">保存</button>
										<!-- <button class="btn" onclick="getContent()">获得内容</button>&nbsp; -->
									</div>
								</div>
							</form>
						</div>
					</div>
					
					
					
				</div>
			</div>
		</div>
		<!-- content end -->
	</div>
	<script type="text/javascript" charset="utf-8" async defer>	

		$(function() { 
			var um = UM.getEditor('myEditor');


			$('#card_logo').uploadify({
		        'swf'      : "{{ asset('uploadify/uploadify.swf')}}",//
		        'formData'     : {
                            'timestamp' : '<?php echo time();?>',
                            '_token'     : "{{csrf_token()}}"
                        },
		        'uploader' : "/bank/add_card_logo",
		        // 'method':'POST',
		        // formData     : {'_token': '{{csrf_token()}}'}, // Laravel表单提交必需参数_token，防止CSRF
	            onUploadSuccess : function(file, data, response) { // 上传成功回调函数
	               console.log(data);
	               $('input[name="card_logo"]').val(data);

	            },
	            onUploadError: function(file, errorCode, errorMsg, errorString) { // 上传失败回调函数
	                // $('#picshow').attr('src', '').hide();
	                // $('#file_upload).val('');
	                alert('上传失败，请重试！');
	            }

		        // Put your options here
		    });
			// 地址选择
			$('#address').address();  

			
			// var upload=$('#event').AmazeuiUpload({
			// 	url : 'pic_uploader'
			// });
			// // var upload=$('#event').AmazeuiUpload({ 
			// // 	url : 'http://localhost/demo.json', 
			// // 	downloadUrl :'', 
			// // 	maxFiles: 50, 	// 单次上传的数量 
			// // 	maxFileSize: 10, // 单个文件允许的大小 (M) 
			// // 	multiThreading: false, // true为同时上传false为队列上传 
			// // 	useDefTemplate: true, //是否使用表格模式 
			// // 	dropType: false, //是否允许拖拽 
			// // 	pasteType: false //是否允许粘贴 
			// // }); 
			// // upload.init(); //对象初始化 
			// // upload.destory(); //对象销毁 
			// // upload.setResult(); //置入已上传的对象 
			// var res= upload.selectResult(); //获取当前已经完成上传的对象
			// console.log(res);

		});




		

		$('.permission_status').change(function(){
			if($(this).prop('checked')){
				$(this).attr('value',1);
			}else{
				$(this).attr('value',0);
			};
		})

		$('form').submit(function(){
			$('input[name="card_info"]').attr('value',UM.getEditor('myEditor').getContent());
			$.ajax({ 
				url: $(this).attr('action'), 
				type:'get',
				data:$(this).serializeArray(),
				success: function(){
					// 治理要关闭当前弹窗同时刷新父窗口
					window.parent.location.reload();
				}
			});
			return false;
		})

		// // 获取内容
		// function getContent() {
	 //        var arr = [];
	 //        arr.push("使用editor.getContent()方法可以获得编辑器的内容");
	 //        arr.push("内容为：");
	 //        arr.push(UM.getEditor('myEditor').getContent());
	 //        alert(arr.join("\n"));
	 //    }
	</script>
</body>
</html>