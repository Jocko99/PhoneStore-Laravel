<!DOCTYPE html>
<html lang="sr">
    <head>
        @include("fixed.head")
    </head>
    <body>
    @include("fixed.login-registration")
    @include("fixed.header")

    @yield("content")

    @include("fixed.footer")

    @include("fixed.scripts")
    @yield("script")
    </body>
</html>
