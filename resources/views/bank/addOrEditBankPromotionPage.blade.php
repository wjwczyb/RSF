<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加活动</title>
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
						<form class="am-form am-form-horizontal" action="/bank/addBankPromotion" method="get">
							<input type="hidden" name='bankPromotionId' value='{{$bankPromotion->id}}'>
							<div class="am-form-group">
								<label class="am-u-sm-12 am-u-md-2 am-form-label">活动名称</label>
								<div class="am-u-sm-12 am-u-md-10">
									<input type="text" class="am-input-sm"   name='prom_name' placeholder="请输入银行卡名称" value="{{$bankPromotion->prom_name}}">
								</div>
							</div>
							<div class="am-form-group">
								<label class="am-u-sm-12 am-u-md-2 am-form-label">活动链接</label>
								<div class="am-u-sm-12 am-u-md-10">
									<input type="text" class="am-input-sm"   name='prom_url' placeholder="请输入活动链接" value="{{$bankPromotion->prom_url}}">
								</div>
							</div>

							<div class="am-form-group">
								<label class="am-u-sm-12 am-u-md-2 am-form-label">活动频道</label>
								<div class="am-u-sm-12 am-u-md-10">
									<select name="prom_channel" data-am-selected>
										@foreach ($banks as $bank)
										<option value="{{$bank->id}}">{{$bank->bank_name}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="am-form-group">
								<label class="am-u-sm-12 am-u-md-2 am-form-label">活动类型</label>
								<div class="am-u-sm-12 am-u-md-10">
									<select name="prom_type" data-am-selected>
										@foreach ($banks as $bank)
										<option value="{{$bank->id}}">{{$bank->bank_name}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="am-form-group">
								<label class="am-u-sm-12 am-u-md-2 am-form-label">活动银行</label>
								<div class="am-u-sm-12 am-u-md-10">
									<select name="prom_bank" data-am-selected>
										@foreach ($banks as $bank)
										<option value="{{$bank->id}}">{{$bank->bank_name}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="am-form-group">
								<label class="am-u-sm-12 am-u-md-2 am-form-label">图片上传</label>
								<div class="am-u-sm-12 am-u-md-10">
									<input type="file" id="prom_logo">
									<input type="hidden" name="prom_logo">
								</div>
							</div>
							<div class="am-alert am-alert-danger" id="my-alert" style="display: none">
								<p>开始日期应小于结束日期！</p>
							</div>
							<div class="am-form-group">
								<label for="user-weibo" class="am-u-sm-12 am-u-md-2 am-form-label" >开始时间</label>
								<div class="am-u-sm-12 am-u-md-10">
									<input type="text" class="am-form-field" name='prom_starttime' id='prom_starttime' placeholder="点击设置开始时间" data-am-datepicker readonly required />
								</div>
							</div>
							<div class="am-form-group">
								<label for="user-weibo" class="am-u-sm-12 am-u-md-2 am-form-label" >结束时间</label>
								<div class="am-u-sm-12 am-u-md-10">
									<input type="text" class="am-form-field" name='prom_endtime' id='prom_endtime' 
									placeholder="点击设置结束时间" data-am-datepicker readonly required />
								</div>
							</div>

							<div class="am-form-group">
								<label for="user-weibo" class="am-u-sm-12 am-u-md-2 am-form-label">活动详细信息</label>
								<div class="am-u-sm-12 am-u-md-10">
									<input type="hidden" name="prom_info" value="{{$bankPromotion->prom_info}}"/>
									<script type="text/plain" id="myEditor" style="width:1000px;height:240px;">
										<p></p>
									</script>
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
		var um = UM.getEditor('myEditor');

		var startDate = new Date(2014, 11, 20);
		var endDate = new Date(2014, 11, 25);
		var $alert = $('#my-alert');
		$('#prom_starttime').datepicker().
		on('changeDate.datepicker.amui', function(event) {
			if (event.date.valueOf() > endDate.valueOf()) {
				$alert.find('p').text('开始日期应小于结束日期！').end().show();
			} else {
				$alert.hide();
				startDate = new Date(event.date);
				$('#prom_starttime').data('date');
			}
			$(this).datepicker('close');
		});

		$('#prom_endtime').datepicker().
		on('changeDate.datepicker.amui', function(event) {
			if (event.date.valueOf() < startDate.valueOf()) {
				$alert.find('p').text('结束日期应大于开始日期！').end().show();
			} else {
				$alert.hide();
				endDate = new Date(event.date);
				$('#prom_endtime').data('date');
			}
			$(this).datepicker('close');
		});


		
		$('#prom_logo').uploadify({
		        'swf'      : "{{ asset('uploadify/uploadify.swf')}}",//
		        'formData'     : {
		        	'timestamp' : '<?php echo time();?>',
		        	'_token'     : "{{csrf_token()}}"
		        },
		        'uploader' : "/bank/add_prom_logo",
		        // 'method':'POST',
		        // formData     : {'_token': '{{csrf_token()}}'}, // Laravel表单提交必需参数_token，防止CSRF
	            onUploadSuccess : function(file, data, response) { // 上传成功回调函数
	            	console.log(data);
	            	$('input[name="prom_logo"]').val(data);

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

		});






	$('.permission_status').change(function(){
		if($(this).prop('checked')){
			$(this).attr('value',1);
		}else{
			$(this).attr('value',0);
		};
	})

	$('form').submit(function(){
		$('input[name="prom_info"]').attr('value',UM.getEditor('myEditor').getContent());
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
</script>
</body>
</html>