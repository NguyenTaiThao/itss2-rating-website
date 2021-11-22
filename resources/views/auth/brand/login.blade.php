<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link href={{ asset("bootstrap/css/bootstrap.min.css") }} rel="stylesheet" />
    <link href={{ asset("css/brand/login.css") }} rel="stylesheet" />
    <script src={{ asset("bootstrap/js/bootstrap.min.js") }} type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/b87939425c.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container">
        <div class="row pt-5 mt-0 align-items-center">
            <!-- For Demo Purpose -->
            <div class="col-md-5 pr-lg-5 mb-5 mb-md-0 text-center">
                <img src="https://bootstrapious.com/i/snippets/sn-registeration/illustration.svg" alt="" class="img-fluid mb-3 d-none d-md-block">
                <h1>Create an Account</h1>
            </div>

            <!-- Registeration Form -->
            <div class="col-md-7 col-lg-6 ml-auto">
                <form action="#">
                    <div class="row">

                        <!-- company Name -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-user text-muted"></i>
                                </span>
                            </div>
                            <input id="firstName" type="text" name="firstname" placeholder="Brand name" class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Email Address -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-envelope text-muted"></i>
                                </span>
                            </div>
                            <input id="email" type="email" name="email" placeholder="Email Address" class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Phone Number -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-phone-square text-muted"></i>
                                </span>
                            </div>
                            <select id="countryCode" name="countryCode" style="max-width: 80px" class="custom-select form-control bg-white border-left-0 border-md h-100 font-weight-bold text-muted">
                                <option value="">+12</option>
                                <option value="">+10</option>
                                <option value="">+15</option>
                                <option value="">+18</option>
                            </select>
                            <input id="phoneNumber" type="tel" name="phone" placeholder="Phone Number" class="form-control bg-white border-md border-left-0 pl-3">
                        </div>.


                        <!-- Job -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-black-tie text-muted"></i>
                                </span>
                            </div>
                            <select id="job" name="jobtitle" class="form-control custom-select bg-white border-left-0 border-md">
                                <option value="">Choose your company's field</option>
                                <option value="">Cars</option>
                                <option value="">Planes</option>
                                <option value="">Motor Bike</option>
                                <option value="">Clothings</option>
                            </select>
                        </div>

                        <!-- Password -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-lock text-muted"></i>
                                </span>
                            </div>
                            <input id="password" type="password" name="password" placeholder="Password" class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Password Confirmation -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-lock text-muted"></i>
                                </span>
                            </div>
                            <input id="passwordConfirmation" type="text" name="passwordConfirmation" placeholder="Confirm Password" class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group col-lg-12 mb-0">
                            <button type="submit" class="btn btn-primary btn-block auth-btn">
                                <span class="font-weight-bold">Create your account</span>
                            </button>
                        </div>

                        <!-- Divider Text -->
                        <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                            <div class="border-bottom w-100 ml-5"></div>
                            <span class="px-2 small text-muted font-weight-bold text-muted">OR</span>
                            <div class="border-bottom w-100 mr-5"></div>
                        </div>

                        <!-- Social Login -->
                        <div class="form-group col-lg-12 mx-auto d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-block py-2 btn-facebook auth-btn">
                                <i class="fa fa-facebook-f mr-2"></i>
                                <span class="font-weight-bold">Continue with Facebook</span>
                            </button>
                            <button type="submit" class="btn btn-primary btn-block py-2 btn-twitter auth-btn">
                                <i class="fa fa-twitter mr-2"></i>
                                <span class="font-weight-bold">Continue with Twitter</span>
                            </button>
                        </div>

                        <!-- Already Registered -->
                        <div class="text-center w-100 mt-2">
                            <p class="text-muted font-weight-bold">Already Registered? <a href="#" class="text-primary ml-2">Login</a></p>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    // For Demo Purpose [Changing input group text on focus]
    $(function() {
        $('input, select').on('focus', function() {
            $(this).parent().find('.input-group-text').css('border-color', '#80bdff');
        });
        $('input, select').on('blur', function() {
            $(this).parent().find('.input-group-text').css('border-color', '#ced4da');
        });
    });
</script>