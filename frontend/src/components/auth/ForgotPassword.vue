<template>
<div class="container my-5">
    <div class="row">
        <div class="d-flex justify-content-center py-4 mb-2 col-12">
            <div class="logo logo--medium"><a href="/" class="router-link-active"><img src="./../../assets/logo_full.svg" alt="Viblo Accounts" class="logo-image"></a></div>
        </div>
    </div>
    <div class="row">
        <div class="offset-md-1 offset-lg-2 col-sm-12 col-md-10 col-lg-8">
            <div class="el-card is-always-shadow">
                <!---->
                <div class="el-card__body">
                    <h1 class="card-title">
                        Quên mật khẩu
                    </h1>
                    <p class="card-subtitle mt-4">
                        Bạn quên mật khẩu của mình? Đừng lo lắng! Hãy cung cấp cho chúng tôi email bạn sử dụng để đăng ký tài khoản Viblo. Chúng tôi sẽ gửi cho bạn một liên kết để đặt lại mật khẩu của bạn qua email đó.
                    </p>
                    <form class="el-form py-4">
                        <!---->
                        <div class="el-form-item is-required"><label for="email" class="el-form-item__label">Địa chỉ email của bạn</label>
                            <div class="el-form-item__content">
                                <div class="el-input">
                                    <!----><input type="text" autocomplete="off" class="el-input__inner">

                                </div>
                                <!---->
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button disabled="disabled" type="button" class="btn btn-primary" style="margin-top: 20px;">
                                <span>
                                    Gửi email cho tôi
                                </span></button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
