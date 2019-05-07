package com.privysol.smartlock;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

import dmax.dialog.SpotsDialog;

public class MainActivity extends AppCompatActivity {

    Button login;
    EditText email, password;

    SpotsDialog dialog;

    public static final String URL = BaseUrl.getInstance();


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        login = findViewById(R.id.loginButton);

        email = findViewById(R.id.emailEditText);
        password = findViewById(R.id.passwordEditText);

        dialog = new SpotsDialog(MainActivity.this);


        login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                doLogin();
            }
        });



    }


    public Boolean checkOnline(){
        ConnectivityManager conMgr =  (ConnectivityManager) MainActivity.this.getSystemService(Context.CONNECTIVITY_SERVICE);
        NetworkInfo netInfo = conMgr.getActiveNetworkInfo();
        if (netInfo == null){

            Toast.makeText(MainActivity.this, "Not internet connection", Toast.LENGTH_SHORT).show();

            return false;

        }else{
            return true;
        }
    }

    public void doLogin() {


        if (notEmpty() && checkOnline()) {

            dialog.show();

            final String femail     = email.getText().toString().trim();
            final String fpassword  = password.getText().toString().trim();


            StringRequest stringRequest = new StringRequest(Request.Method.POST, URL+"login", new Response.Listener<String>() {
                @Override
                public void onResponse(String response) {


                    try {
                        JSONArray jsonArray = new JSONArray(response);
                        JSONObject jsonObject = jsonArray.getJSONObject(0);


                        String code = jsonObject.getString("code");
                        String message = jsonObject.getString("message");


                        if(code.equals("login_success")){


                            String id          = jsonObject.getString("id");
                            String name        = jsonObject.getString("name");
                            String email       = jsonObject.getString("email");
                            String password    = jsonObject.getString("password");
                            String contact     = jsonObject.getString("contact");

                            SharedPreferences setting = getSharedPreferences("USER_PREFS", 0);
                            SharedPreferences.Editor editor = setting.edit();

                            editor.putString("id", id);
                            editor.putString("name", name);
                            editor.putString("email", email);
                            editor.putString("password", password);
                            editor.putString("contact", contact);
                            editor.putBoolean("isLoggedIn", true);

                            editor.commit();


                            dialog.cancel();

                            Intent intent = new Intent(MainActivity.this, BarCodeActivity.class);
                            startActivity(intent);
                            finish();

                        }
                        else{
                            Toast.makeText(MainActivity.this, message, Toast.LENGTH_SHORT).show();
                            dialog.cancel();
                        }


                    } catch (JSONException e) {
                        Toast.makeText(MainActivity.this, "Error: "+e, Toast.LENGTH_SHORT).show();
                        dialog.cancel();

                    }

                }
            }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
                    Toast.makeText(MainActivity.this, "Slow Internet Detected", Toast.LENGTH_SHORT).show();
                    dialog.cancel();
                }
            }){
                @Override
                protected Map<String, String> getParams() throws AuthFailureError {
                    Map<String, String> params = new HashMap<String, String>();

                    params.put("email",femail);
                    params.put("password",fpassword);

                    return params;
                }
            };

            RequestQueue requestque = Volley.newRequestQueue(MainActivity.this);
            requestque.add(stringRequest);
            requestque.getCache().clear();


        }


    }



    public Boolean notEmpty(){

        if(email.getText().toString().trim().isEmpty()){
            email.setError("Email is required");
            return false;
        }
        else if(password.getText().toString().trim().isEmpty()){
            password.setError("Password is required");
            return false;
        }
        else if( !isEmailValid(email.getText().toString().trim())  ){
            email.setError("Invalid Email Format");
            return false;
        }
        else{
            return true;
        }

    }


    public boolean isEmailValid(String email) {
        return android.util.Patterns.EMAIL_ADDRESS.matcher(email).matches();
    }






}
