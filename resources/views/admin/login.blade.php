
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng nhập</title>
	<link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap&subset=vietnamese" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('libs/bootstrap-4.4.1/css/bootstrap.min.css') }}">
	<script src="{{ asset('libs/jquery-3.4.1/jquery-3.4.1.min.js') }}"></script>
</head>
<body>
	<section class="login">
		<div class="container">
			<div class="row">
				<div class="col-3"></div>
				<div class="col-6">
					<form action="{{ route('admin.login') }}" id="login" method="POST">
						@csrf
						<h3>Đăng Nhập</h3>
						<span class="error"></span>
						<div class="form-group">
							<label for="">Tên đăng nhập</label>
							<input type="text" class="form-control" name="email" value="">
							<label for="email" class="error"></label>
						</div>
						<div class="form-group">
							<label for="">Mật khẩu</label>
							<input type="password" class="form-control" name="password" value="">
							<label for="password" class="error"></label>
						</div>
						<div class="form-group">
							<button type="submit">Đăng nhập</button>
						</div>
					</form>
				</div>
				<div class="col-3"></div>
			</div>
			
		</div>
	</section>
	<style>
		* { font-family: Cabin;  }
		.error { font-size: 13px; font-weight: 500; color: #dc3333; margin-bottom: 10px; }
		.container{ margin-top: 10vh  }
		body { background-color: #ebebeb  }
		form h3 { margin-bottom: 24px; font-weight: 400  }
		form{  padding: 55px; border-radius: 10px; background-color: #fff }
		.form-group { margin-bottom: 36px;  }
		.form-group label::first-child{font-size: 13px; font-weight: 500; padding-bottom: 11px; color: #555555; line-height: 1.4; text-transform: uppercase;   }
		.form-group input { height: 45px;  }
		.form-group input.invalid { border: 1px solid #dc3333; } 
		label.error:empty{ display: none; }
		button:focus{ outline: none; }
		button{ font-size: 16px;
            color: #fff;
            display: flex;
            line-height: 1.2;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 20px;
            min-width: 150px;
            height: 55px; 
                background-color: #333333;
            border-radius: 27px;
            border: none; 
        }
	</style>
	<script src=" {{ asset('libs/bootstrap-4.4.1/js/bootstrap.min.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
	<script>
		$("#login").validate({ 
			rules: {
				email: {
					required: true,	
				},
				password: {
					required: true,
				}
			},
			messages: {
				email: {
					required: "Vui lòng nhập tên đăng nhập.",
				},
				
				password: {
					required: "Vui lòng nhập mật khẩu.",
				}
			} 

		})
	</script>
</body>
</html>