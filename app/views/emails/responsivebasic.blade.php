<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width" />

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Gokkasten CRM</title>

</head>

<body bgcolor="#e6e7e8" style="font-family: 'Verdana'; background: #e6e7e8; margin: 0 auto;padding: 0;">
<table style="width: 100%; background: #e6e7e8; margin: 0 auto;">
    <tr>
        <td style="width: 100%">

        <table style="margin:0 auto; padding: 0; background: #fff; border-top: 2px solid #000; width: 600px;" class="aligncenter">
        <tr>
        <td style="">

            <!-- BODY -->
            <table style="width: 100%;">
                <tr>
                    <td></td>
                    <td class="container" bgcolor="#FFFFFF">

                            <table style="width: 100%; ">
                                <tr>
                                    <td>
                                    @yield('content')
                                    </td>
                                </tr>
                            </table>


                    </td>
                    <td></td>
                </tr>
            </table><!-- /BODY -->

            <!-- FOOTER -->
            <table class="footer-wrap" style="background:#c9c9c9; width: 100%;">
                <tr>
                    <td></td>
                    <td class="container">
                        <!-- content -->
                        <div class="content">
                            <table>
                                <tr>
                                    <td align="center">
                                        <p style="color: #fff; font-size: 11px;">
                                            @yield('reasonmessage')
                                        </p>
                                        <p style="color: #777777; font-size: 11px;">
                                            @yield('footer')
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div><!-- /content -->

                    </td>
                    <td></td>
                </tr>
            </table><!-- /FOOTER -->
        </td>
        </tr>
        </table>

        </td>
    </tr>
</table>
</body>
</html>