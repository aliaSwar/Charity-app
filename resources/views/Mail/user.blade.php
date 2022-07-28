<!DOCTYPE html>

<html lang="ar" class="light-style  customizer-hide" dir="rtl" data-theme="theme-default"
    data-assets-path="assets/" data-template="vertical-menu-template-no-customizer">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>انعاش الفقير </title>

    <meta name="description" content="" />

</head>

<body lang="ar">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h1>يسر جمعية انعاش الفقير الخيرية انضمامكم لفريقنا </h1>
                <div class="card mb-0">
                    <p>
                        اسم المستخدم الخاص بك هو :{{ $user->name }}
                    </p>
                    <p>
                        كلمة المرور الخاصة بك هي:{{ $password }}
                    </p>
                </div>
                <p> المنصب الوظيفي هو :@foreach ($user->roles as $role)
                        {{ $role->name }}
                    @endforeach
                </p>

            </div>
        </div>

    </div>

</body>

</html>
