$("#category").on('change', function () {
    var adding1 = "<label for=\"recipient-name\" class=\"control-label\">SMTP :\n" +
        "                                        Server:Port,email,password</label><br>\n" +
        "                                    <label for=\"recipient-name\" class=\"control-label\">Leads: Url ,descript\n" +
        "                                        ,amount</label>\n" +
        "\n" +
        "\n" +
        "                                    <textarea name=\"value\" class=\"form-control\" id=\"message-text\"\n" +
        "                                              style=\"height: 150px\"\n" +
        "                                              placeholder=\"\" required></textarea>";
    var adding4 = "<div id=\"adding4\" style=\"display: block;\">\n" +
        "                                            <div class=\"form-group\">\n" +
        "                                                <label for=\"recipient-name\" class=\"control-label\">Windows\n" +
        "                                                    versions</label>\n" +
        "                                                <select class=\"form-control\" name=\"windows_versions\">\n" +
        "                                                    <option value=\"2019\">2019</option>\n" +
        "                                                    <option value=\"2016\">2016</option>\n" +
        "                                                    <option value=\"2012\">2012</option>\n" +
        "                                                    <option value=\"2008\">2008</option>\n" +
        "                                                    <option value=\"10\">10</option>\n" +
        "                                                    <option value=\"7\">7</option>\n" +
        "                                                    <option value=\"ME\">ME</option>\n" +
        "                                                </select>\n" +
        "                                            </div>\n" +
        "\n" +
        "                                            <div class=\"form-group\">\n" +
        "                                                <label for=\"rdp_ram\" class=\"control-label\">Ram</label>\n" +
        "                                                <input type=\"text\" name=\"ram\" class=\"form-control\" id=\"rdp_ram\"\n" +
        "                                                       value=\"1GB / Fast\"\n" +
        "                                                       required>\n" +
        "                                            </div>\n" +
        "\n" +
        "                                            <div class=\"form-group\">\n" +
        "                                                <label for=\"rdp_username\" class=\"control-label\">Username</label>\n" +
        "                                                <input type=\"text\" name=\"username\" class=\"form-control\"\n" +
        "                                                       id=\"rdp_username\"\n" +
        "                                                       value=\"\"\n" +
        "                                                       required>\n" +
        "                                            </div>\n" +
        "\n" +
        "                                            <div class=\"form-group\">\n" +
        "                                                <label for=\"rdp_userpass\" class=\"control-label\">Password</label>\n" +
        "                                                <input type=\"text\" name=\"userpass\" class=\"form-control\"\n" +
        "                                                       id=\"rdp_userpass\"\n" +
        "                                                       value=\"\"\n" +
        "                                                       required>\n" +
        "                                            </div>\n" +
        "\n" +
        "                                            <div class=\"form-group\">\n" +
        "                                                <label for=\"rdp_detected_hosting\" class=\"control-label\">Detected\n" +
        "                                                    Hosting</label>\n" +
        "                                                <input type=\"text\" name=\"detected_hosting\" class=\"form-control\"\n" +
        "                                                       id=\"rdp_detected_hosting\"\n" +
        "                                                       value=\"\"\n" +
        "                                                       required>\n" +
        "                                            </div>\n" +
        "                                        </div>";
    var adding5 = "<div id=\"adding5\" style=\"display: block;\">\n" +
        "                                            <div class=\"form-group\">\n" +
        "                                                <label for=\"ssh_info\" class=\"control-label\">Information</label>\n" +
        "                                                <input type=\"text\" name=\"ssh_info\" class=\"form-control\" id=\"ssh_info\"\n" +
        "                                                       value=\"\"\n" +
        "                                                       required>\n" +
        "                                            </div>\n" +
        "\n" +
        "                                            <div class=\"form-group\">\n" +
        "                                                <label for=\"recipient-name\" class=\"control-label\">RAM</label>\n" +
        "                                                <select class=\"form-control\" name=\"ssh_ram\">\n" +
        "                                                    <option value=\"128GB\">128GB</option>\n" +
        "                                                    <option value=\"64GB\">64GB</option>\n" +
        "                                                    <option value=\"32GB\">32GB</option>\n" +
        "                                                    <option value=\"16GB\">16GB</option>\n" +
        "                                                    <option value=\"8GB\">8GB</option>\n" +
        "                                                    <option value=\"4GB\">4GB</option>\n" +
        "                                                    <option value=\"3GB\">3GB</option>\n" +
        "                                                    <option value=\"2GB\">2GB</option>\n" +
        "                                                    <option value=\"1GB\">1GB</option>\n" +
        "                                                    <option value=\"768MB\">768MB</option>\n" +
        "                                                    <option value=\"512MB\">512MB</option>\n" +
        "                                                    <option value=\"256MB\">256MB</option>\n" +
        "                                                    <option value=\"128MB\">128MB</option>\n" +
        "                                                </select>\n" +
        "                                            </div>\n" +
        "\n" +
        "                                            <div class=\"form-group\">\n" +
        "                                                <label for=\"ssh_whm\" class=\"control-label\">WHM</label>\n" +
        "                                                <select class=\"form-control\" name=\"ssh_whm\">\n" +
        "                                                    <option value=\"yes\">Yes</option>\n" +
        "                                                    <option value=\"no\">No</option>\n" +
        "                                                </select>\n" +
        "                                            </div>\n" +
        "\n" +
        "                                            <div class=\"form-group\">\n" +
        "                                                <label for=\"ssh_detected_hosting\" class=\"control-label\">Detected\n" +
        "                                                    Hosting</label>\n" +
        "                                                <input type=\"text\" name=\"ssh_detected_hosting\" class=\"form-control\"\n" +
        "                                                       id=\"ssh_detected_hosting\"\n" +
        "                                                       value=\"\"\n" +
        "                                                       required>\n" +
        "                                            </div>\n" +
        "\n" +
        "                                        </div>";
    var adding6 = "<div id=\"adding6\" style=\"display: block;\">\n" +
        "\n" +
        "                                            <div class=\"form-group\">\n" +
        "                                                <label for=\"cpanel_tld\" class=\"control-label\">TLD</label>\n" +
        "                                                <select class=\"form-control\" name=\"cpanel_tld\">\n" +
        "                                                    <option value=\".com\">.com</option>\n" +
        "                                                    <option value=\".org\">.org</option>\n" +
        "                                                    <option value=\".info\">.info</option>\n" +
        "                                                    <option value=\".uk\">.uk</option>\n" +
        "                                                    <option value=\".pw\">.pw</option>\n" +
        "                                                    <option value=\".co.kr\">.co.kr</option>\n" +
        "                                                    <option value=\".ca\">.ca</option>\n" +
        "                                                    <option value=\".net\">.net</option>\n" +
        "                                                    <option value=\".in\">.in</option>\n" +
        "                                                    <option value=\".co.uk\">.co.uk</option>\n" +
        "                                                    <option value=\".cf\">.cf</option>\n" +
        "                                                    <option value=\".pt\">.pt</option>\n" +
        "                                                    <option value=\".ml\">.ml</option>\n" +
        "                                                    <option value=\".nl\">.nl</option>\n" +
        "                                                    <option value=\".re.kr\">.re.kr</option>\n" +
        "                                                    <option value=\".ga\">.ga</option>\n" +
        "                                                    <option value=\".tk\">.tk</option>\n" +
        "                                                    <option value=\".financial\">.financial</option>\n" +
        "                                                    <option value=\".co.ke\">.co.ke</option>\n" +
        "                                                    <option value=\".com.br\">.com.br</option>\n" +
        "                                                    <option value=\".gq\">.gq</option>\n" +
        "                                                    <option value=\".org.uk\">.org.uk</option>\n" +
        "                                                    <option value=\".co.mz\">.co.mz</option>\n" +
        "                                                    <option value=\".org.uk\">.org.uk</option>\n" +
        "                                                    <option value=\".xyz\">.xyz</option>\n" +
        "                                                    <option value=\".aero\">.aero</option>\n" +
        "                                                    <option value=\".feyer.us\">.feyer.us</option>\n" +
        "                                                    <option value=\".jalkalp.c\">.jalkalp.c</option>\n" +
        "                                                    <option value=\".reviews\">.reviews</option>\n" +
        "                                                    <option value=\".shop\">.shop</option>\n" +
        "                                                    <option value=\".vn\">.vn</option>\n" +
        "                                                    <option value=\".website\">.website</option>\n" +
        "                                                    <option value=\".org.ng\">.org.ng</option>\n" +
        "                                                    <option value=\".club\">.club</option>\n" +
        "                                                    <option value=\".valldorei\">.valldorei</option>\n" +
        "                                                    <option value=\".online\">.online</option>\n" +
        "                                                    <option value=\".mobi\">.mobi</option>\n" +
        "                                                </select>\n" +
        "                                            </div>\n" +
        "\n" +
        "                                            <div class=\"form-group\">\n" +
        "                                                <label for=\"cpanel_ssl\" class=\"control-label\">SSL</label>\n" +
        "                                                <select class=\"form-control\" name=\"cpanel_ssl\">\n" +
        "                                                    <option value=\"https\">https</option>\n" +
        "                                                    <option value=\"http\">http</option>\n" +
        "                                                </select>\n" +
        "                                            </div>\n" +
        "\n" +
        "                                            <div class=\"form-group\">\n" +
        "                                                <label for=\"cpanel_detected_hosting\" class=\"control-label\">Detected\n" +
        "                                                    Hosting</label>\n" +
        "                                                <input type=\"text\" name=\"cpanel_detected_hosting\" class=\"form-control\"\n" +
        "                                                       id=\"cpanel_detected_hosting\"\n" +
        "                                                       value=\"\"\n" +
        "                                                       required>\n" +
        "                                            </div>\n" +
        "\n" +
        "                                        </div>";

    var adding7 = "<div id=\"adding7\" style=\"display: block;\">\n" +
        "\n" +
        "                                            <div class=\"form-group\">\n" +
        "                                                <label for=\"shell_tld\" class=\"control-label\">TLD</label>\n" +
        "                                                <select class=\"form-control\" name=\"shell_tld\">\n" +
        "                                                    <option value=\".com\">.com</option>\n" +
        "                                                    <option value=\".org\">.org</option>\n" +
        "                                                    <option value=\".info\">.info</option>\n" +
        "                                                    <option value=\".uk\">.uk</option>\n" +
        "                                                    <option value=\".pw\">.pw</option>\n" +
        "                                                    <option value=\".co.kr\">.co.kr</option>\n" +
        "                                                    <option value=\".ca\">.ca</option>\n" +
        "                                                    <option value=\".net\">.net</option>\n" +
        "                                                    <option value=\".in\">.in</option>\n" +
        "                                                    <option value=\".co.uk\">.co.uk</option>\n" +
        "                                                    <option value=\".cf\">.cf</option>\n" +
        "                                                    <option value=\".pt\">.pt</option>\n" +
        "                                                    <option value=\".ml\">.ml</option>\n" +
        "                                                    <option value=\".nl\">.nl</option>\n" +
        "                                                    <option value=\".re.kr\">.re.kr</option>\n" +
        "                                                    <option value=\".ga\">.ga</option>\n" +
        "                                                    <option value=\".tk\">.tk</option>\n" +
        "                                                    <option value=\".financial\">.financial</option>\n" +
        "                                                    <option value=\".co.ke\">.co.ke</option>\n" +
        "                                                    <option value=\".com.br\">.com.br</option>\n" +
        "                                                    <option value=\".gq\">.gq</option>\n" +
        "                                                    <option value=\".org.uk\">.org.uk</option>\n" +
        "                                                    <option value=\".co.mz\">.co.mz</option>\n" +
        "                                                    <option value=\".org.uk\">.org.uk</option>\n" +
        "                                                    <option value=\".xyz\">.xyz</option>\n" +
        "                                                    <option value=\".aero\">.aero</option>\n" +
        "                                                    <option value=\".feyer.us\">.feyer.us</option>\n" +
        "                                                    <option value=\".jalkalp.c\">.jalkalp.c</option>\n" +
        "                                                    <option value=\".reviews\">.reviews</option>\n" +
        "                                                    <option value=\".shop\">.shop</option>\n" +
        "                                                    <option value=\".vn\">.vn</option>\n" +
        "                                                    <option value=\".website\">.website</option>\n" +
        "                                                    <option value=\".org.ng\">.org.ng</option>\n" +
        "                                                    <option value=\".club\">.club</option>\n" +
        "                                                    <option value=\".valldorei\">.valldorei</option>\n" +
        "                                                    <option value=\".online\">.online</option>\n" +
        "                                                    <option value=\".mobi\">.mobi</option>\n" +
        "                                                </select>\n" +
        "                                            </div>\n" +
        "\n" +
        "                                            <div class=\"form-group\">\n" +
        "                                                <label for=\"shell_ssl\" class=\"control-label\">SSL</label>\n" +
        "                                                <select class=\"form-control\" name=\"shell_ssl\">\n" +
        "                                                    <option value=\"https\">https</option>\n" +
        "                                                    <option value=\"http\">http</option>\n" +
        "                                                </select>\n" +
        "                                            </div>\n" +
        "\n" +
        "                                            <div class=\"form-group\">\n" +
        "                                                <label for=\"shell_server_info\" class=\"control-label\">Server\n" +
        "                                                    Information</label>\n" +
        "                                                <input type=\"text\" name=\"shell_server_info\" class=\"form-control\"\n" +
        "                                                       id=\"shell_server_info\"\n" +
        "                                                       value=\"\"\n" +
        "                                                       required>\n" +
        "                                            </div>\n" +
        "\n" +
        "                                            <div class=\"form-group\">\n" +
        "                                                <label for=\"shell_server_os\" class=\"control-label\">Server OS</label>\n" +
        "                                                <select class=\"form-control\" name=\"shell_server_os\">\n" +
        "                                                    <option value=\"linux\">Linux</option>\n" +
        "                                                    <option value=\"windows\">Windows</option>\n" +
        "                                                </select>\n" +
        "                                            </div>\n" +
        "\n" +
        "                                            <div class=\"form-group\">\n" +
        "                                                <label for=\"shell_detected_hosting\" class=\"control-label\">Detected\n" +
        "                                                    Hosting</label>\n" +
        "                                                <input type=\"text\" name=\"shell_detected_hosting\" class=\"form-control\"\n" +
        "                                                       id=\"shell_detected_hosting\"\n" +
        "                                                       value=\"\"\n" +
        "                                                       required>\n" +
        "                                            </div>\n" +
        "\n" +
        "                                        </div>";

    var adding8 = "<div id=\"adding8\" style=\"display: block;\"> <!--phpmailer-->\n" +
        "\n" +
        "                                            <div class=\"form-group\">\n" +
        "                                                <label for=\"mailer_server_info\" class=\"control-label\">Detected\n" +
        "                                                    Hosting</label>\n" +
        "                                                <input type=\"text\" name=\"mailer_server_info\" class=\"form-control\"\n" +
        "                                                       id=\"mailer_server_info\"\n" +
        "                                                       value=\"\"\n" +
        "                                                       required>\n" +
        "                                            </div>\n" +
        "\n" +
        "                                        </div>";

    var adding9 = "<div id=\"adding9\" style=\"display: block;\"> <!--Smtp-->\n" +
        "\n" +
        "                                            <div class=\"form-group\">\n" +
        "                                                <label for=\"smtp_webmail\" class=\"control-label\">Webmail</label>\n" +
        "                                                <select class=\"form-control\" name=\"smtp_webmail\">\n" +
        "                                                    <option value=\"yes\">Yes</option>\n" +
        "                                                    <option value=\"no\">No</option>\n" +
        "                                                </select>\n" +
        "                                            </div>\n" +
        "\n" +
        "                                            <div class=\"form-group\">\n" +
        "                                                <label for=\"smtp_server_info\" class=\"control-label\">Detected\n" +
        "                                                    Hosting</label>\n" +
        "                                                <input type=\"text\" name=\"smtp_server_info\" class=\"form-control\"\n" +
        "                                                       id=\"smtp_server_info\"\n" +
        "                                                       value=\"\"\n" +
        "                                                       required>\n" +
        "                                            </div>\n" +
        "\n" +
        "                                        </div>";
    if (this.value === "4") { //rdps
        $("#content_edit").html(adding4);
        $("#adding1").html("");
        // $("#adding1").hide();
        // $("#adding4").show();
        // $("#adding5").hide();
        // $("#adding6").hide();
        // $("#adding7").hide();
        // $("#adding8").hide();
        // $("#adding9").hide();
    } else if (this.value === "5") { //sshs
        $("#content_edit").html(adding5);
        $("#adding1").html("");
        // $("#adding1").hide();
        // $("#adding4").hide();
        // $("#adding5").show();
        // $("#adding6").hide();
        // $("#adding7").hide();
        // $("#adding8").hide();
        // $("#adding9").hide();
    } else if (this.value === "6") { //cpanels
        $("#content_edit").html(adding6);
        $("#adding1").html("");
        // $("#adding1").hide();
        // $("#adding4").hide();
        // $("#adding5").hide();
        // $("#adding6").show();
        // $("#adding7").hide();
        // $("#adding8").hide();
        // $("#adding9").hide();
    } else if (this.value === "7") { //shells
        $("#content_edit").html(adding7);
        $("#adding1").html("");
        // $("#adding1").hide();
        // $("#adding4").hide();
        // $("#adding5").hide();
        // $("#adding6").hide();
        // $("#adding7").show();
        // $("#adding8").hide();
        // $("#adding9").hide();
    } else if (this.value === "8") { //phpmailers
        $("#content_edit").html(adding8);
        $("#adding1").html("");
        // $("#adding1").hide();
        // $("#adding4").hide();
        // $("#adding5").hide();
        // $("#adding6").hide();
        // $("#adding7").hide();
        // $("#adding8").show();
        // $("#adding9").hide();
    } else if (this.value === "9") { //smtps
        $("#content_edit").html(adding9);
        $("#adding1").html("");
        // $("#adding1").hide();
        // $("#adding4").hide();
        // $("#adding5").hide();
        // $("#adding6").hide();
        // $("#adding7").hide();
        // $("#adding8").hide();
        // $("#adding9").show();
    } else {
        $("#content_edit").html("");
        $("#adding1").html(adding1);
        // $("#adding1").show();
        // $("#adding4").hide();
        // $("#adding5").hide();
        // $("#adding6").hide();
        // $("#adding7").hide();
        // $("#adding8").hide();
        // $("#adding9").hide();
    }
});
