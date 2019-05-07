package com.privysol.smartlock;

import android.content.Intent;
import android.content.SharedPreferences;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.TextView;

public class BarCodeActivity extends AppCompatActivity {

    TextView logout;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_bar_code);


        logout = findViewById(R.id.logoutTextView);

        logout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {


                SharedPreferences setting = getSharedPreferences("USER_PREFS", 0);
                SharedPreferences.Editor editor = setting.edit();

                editor.putString("id", "");
                editor.putString("name", "");
                editor.putString("email", "");
                editor.putString("password", "");
                editor.putString("contact", "");
                editor.putBoolean("isLoggedIn", false);

                editor.commit();

                Intent intent = new Intent(BarCodeActivity.this, MainActivity.class);
                startActivity(intent);
                finish();


            }
        });


    }
}
