<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>增加银行</title>
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
							<form class="am-form am-form-horizontal" action="{{route('add_bank_func')}}" method="get" id="upload">
								<input type="hidden" name='bank_id' value=''>
								<div class="am-form-group">
									<label class="am-u-sm-12 am-u-md-2 am-form-label">银行名称</label>
									<div class="am-u-sm-12 am-u-md-10">
										<input type="text" class="am-input-sm"   name='bank_name' placeholder="请输入银行名称" value="{{empty($bank->bank_name)?'':$bank->bank_name}}">
									</div>
								</div>

								<div class="am-form-group">
									<label class="am-u-sm-12 am-u-md-2 am-form-label">银行级别</label>
									<div class="am-u-sm-12 am-u-md-10">
										<select name="bank_level" data-am-selected>
											<option value="1"  selected="true">总行</option>
											<option value="2"  >省级分行</option>
											<option value="3">市级分行</option>
											<option value="4">县级分行</option>
										</select>
									</div>
								</div>
								<div class="am-form-group">
									<label class="am-u-sm-12 am-u-md-2 am-form-label">银行类型</label>
									<div class="am-u-sm-12 am-u-md-10">
										<select name="bank_type" data-am-selected>
											<option value="1" >国有银行</option>
											<option value="2" >农商行</option>
											<option value="3" >民营银行</option>
											<option value="4" >农村信合</option>
											<option value="5" >外资银行</option>
										</select>
									</div>
								</div>
								
								<div class="am-form-group">
									<label class="am-u-sm-12 am-u-md-2 am-form-label">图片上传</label>
									<div class="am-u-sm-12 am-u-md-10">
										<input type="file" id="bank_logo">
										<input type="hidden" name="bank_logo" value="{{empty($bank->bank_logo)?'':$bank->bank_logo}}">
									</div>
								</div>

								<div class="am-form-group">
									<label class="am-u-sm-12 am-u-md-2 am-form-label">上级银行</label>
									<div class="am-u-sm-12 am-u-md-10">
										<select name="parent_bank_id" data-am-selected>
											<option value="0">无</option>
											@foreach ($banks as $bank)
												<option value="{{$bank->id}}">{{$bank->bank_name}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="am-form-group">
									<label class="am-u-sm-12 am-u-md-2 am-form-label">银行地址</label>
									<div class="am-u-sm-12 am-u-md-10" >
											<div class="am-form-group am-input-group" id="address">
												<input  type="text" name="bank_addr1" class="am-form-field am-radius" placeholder="请选择省市区" > 
											</div>
											<input type="text" value="" name="bank_addr2" placeholder="请输入详细地址">
									</div>
								</div>
								<div class="am-form-group">
									<label for="user-weibo" class="am-u-sm-12 am-u-md-2 am-form-label">联系人名称</label>
									<div class="am-u-sm-12 am-u-md-10">
										<input type="text" class="am-input-sm"  name='contacts'  value="" placeholder="请填写联系人名称">
									</div>
								</div>
								<div class="am-form-group">
									<label for="user-weibo" class="am-u-sm-12 am-u-md-2 am-form-label">联系人电话</label>
									<div class="am-u-sm-12 am-u-md-10">
										<input type="text" class="am-input-sm"  name='contact_phone'  value="" placeholder="请填写联系人电话">
									</div>
								</div>
								{{ csrf_field() }}
								
								<div class="am-form-group">
									<div class="am-u-sm-12 am-u-md-10 am-u-md-push-2">
										<button type="submit" class="am-btn am-btn-primary">保存</button>
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


			$('#bank_logo').uploadify({
		        'swf'      : "{{ asset('uploadify/uploadify.swf')}}",//
		        'formData'     : {
                            'timestamp' : '<?php echo time();?>',
                            '_token'     : "{{csrf_token()}}"
                        },
		        'uploader' : "/bank/add_bank_logo",
		        // 'method':'POST',
		        // formData     : {'_token': '{{csrf_token()}}'}, // Laravel表单提交必需参数_token，防止CSRF
	            onUploadSuccess : function(file, data, response) { // 上传成功回调函数
	               console.log(data);
	               $('input[name="bank_logo"]').val(data);

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


			$.ajax({ 
				url: $(this).attr('action'), 
				type:'get',
				data:$(this).serializeArray(),
				dataType:'json',
				success: function(data){
					// console.log(data);
					// 治理要关闭当前弹窗同时刷新父窗口
					// console.log(data['insert_res'])
					if(data['insert_res']){
						window.parent.location.reload();
					}else{
						alert(data['message']);
					}
					return false;
				}
			});
			return false;
		})


	</script>
</body>
</html>