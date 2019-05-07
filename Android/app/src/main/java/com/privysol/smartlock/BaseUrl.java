package com.privysol.smartlock;

public class BaseUrl {

    public static String url;
    public static String LOCALHOST = "http://192.168.10.5/smartlock/api/api.php?action=";

    private BaseUrl() {
    }

    public static String getInstance(){

        if (url == null){

            url = LOCALHOST;
        }
        return url;


    }


}



