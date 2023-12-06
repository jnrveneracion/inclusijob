<html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                line-height: 1.6;
            }

            .container {
                max-width: 600px;
                margin: 20px auto;
            }

            .header {
                background-color: white;
                color: #0d84f5;
                text-align: center;
                padding: 15px;
            }

            .logo img {
                max-width: 100px;
                height: auto;
            }

            .content {
                padding: 20px;
            }

            .footer {
                background-color: #f4f4f4;
                padding: 10px;
                text-align: center;
                border-radius: 5px;
                margin: 5px;
            }

            .note {
                color: #999;
                font-size: 12px;
                margin-top: 10px;
            }

            .link {
                color: #0d84f5;
                text-decoration: underline;
                font-weight: bold;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="header" style="background-color: white; color: #0d84f5; text-align: center; padding: 15px;">
                <div class="logo">
                    <img src="https://scontent.fmnl30-3.fna.fbcdn.net/v/t39.30808-6/408691554_3642240022699858_7657880954236639016_n.jpg?stp=cp6_dst-jpg&_nc_cat=104&ccb=1-7&_nc_sid=3635dc&_nc_eui2=AeGXmjLBoeuti1HbFZdnefUqBaHhFkuczbQFoeEWS5zNtF0IIy88lZGa77MR4IMdv-k8I6Xx0JP4YmQJ85cboxCN&_nc_ohc=mVFODFL57RMAX9s0vcz&_nc_ht=scontent.fmnl30-3.fna&oh=00_AfBg01IC21-OnQTs2MOD49_1uMr9XxMaXjxzox1xdef2Rw&oe=6575C561" alt="Company Logo" style="max-width: 200px; height: auto;">
                </div>
                <h2>Congratulations, ' . $jobSeekerName . '!</h2>
            </div>
            <div class="content" style="padding: 20px;">
                <p style="color: black;">We are pleased to inform you that ' . $company_name . ' has selected you for the position of ' . $job_title . '.</p>
                <p style="color: black;">Your journey with ' . $company_name . ' begins today, ' . date('F j, Y') . '.</p>
                <p style="color: black;">Welcome to the team!</p>
                <p style="color: black;">For more details and to get started, please <a class="link" href="https://inclusijob.com" style="color: #0d84f5; text-decoration: underline; font-weight: bold;">visit your account</a> on our website.</p>
                <div class="note" style="color: #999; font-size: 12px; margin-top: 10px;">Note: This is an automated email. Please do not reply to this message.</div>
            </div>
            <div class="footer" style="background-color: #f4f4f4; padding: 10px; text-align: center; border-radius: 5px; margin: 5px;">
                <p style="color: black;">Thank you for choosing <a class="link" href="https://inclusijob.com" style="color: #0d84f5; text-decoration: underline; font-weight: bold;">InclusiJob</a> for your career journey.</p>
            </div>
        </div>
    </body>
</html>