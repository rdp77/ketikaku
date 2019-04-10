<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Eliteadmin Responsive web app kit</title>
</head>

<body style="margin:0px; background: #f8f8f8; ">
    <div width="100%" style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
        <div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px">
            <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
                <tbody>
                    <tr>
                        <td style="vertical-align: top;" align="center">
                            <a href="ketikaku.com" target="_blank"><img width="200px" src="https://i.ibb.co/kxjHKKx/logo-text.png" alt="KETIKAKU" style="border:none"><br/>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                <tbody>
                    <tr>
                        <td style="background:#ff3434; padding:20px; color:#fff; text-align:center;"> <b>PENTING ! Segera Lakukan Verifikasi Email.</b> </td>
                    </tr>
                </tbody>
            </table>
            <div style="padding: 40px; background: #fff;">
                <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                    <tbody>
                        <tr>
                            <td>
                                <p>Hello <b>{{ $username }}</b>,</p>
                                <p>SELAMAT DATANG DI KETIKAKU, Mohon Veriifkasi Email anda untuk mendapatkan semua fitur</p>
                                <center>
                                    <a href="{{ url('/verified/'.$token.'/'.$code) }}" style="display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #4fc3f7; border-radius: 60px; text-decoration:none;">Verifikasi</a>
                                </center>
                                <p>Hormat kami </p><b> Team Ketikaku </b> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="text-align: center; font-size: 12px; color: #b2b2b5; margin-top: 20px">
                <p> Powered by KETIKAKU
                    <br>
                    {{-- <a href="javascript: void(0);" style="color: #b2b2b5; text-decoration: underline;">Unsubscribe</a> </p> --}}
            </div>
        </div>
    </div>
</body>

</html> --}}



{{-- ini tester