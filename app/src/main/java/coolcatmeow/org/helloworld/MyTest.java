import android.graphics.Color;
import android.net.Uri;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.text.Spannable;
import android.text.SpannableString;
import android.text.Spanned;
import android.text.TextPaint;
import android.text.TextUtils;
import android.text.method.LinkMovementMethod;
import android.text.style.ClickableSpan;
import android.text.style.ForegroundColorSpan;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.appindexing.Action;
import com.google.android.gms.appindexing.AppIndex;
import com.google.android.gms.common.api.GoogleApiClient;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.util.LinkedList;

public class MyTest extends AppCompatActivity {
    private TextView ourMessage;

    public static void main(String[] args) {

        loadStatus();
    }

    private JSONArray loadUrl(String location) {
        LinkedList<String> lines = new LinkedList<String>();

        // Download URL to array of lines
        try {
            // Open URL
            URL url = new URL(location);
            HttpURLConnection conn = (HttpURLConnection) url.openConnection();

            // Open buffered reader
            InputStream is = conn.getInputStream();
            InputStreamReader isr = new InputStreamReader(is);
            BufferedReader buf = new BufferedReader(isr);

            // Read data into lines array
            String line;
            while ((line = buf.readLine()) != null)
                lines.add(line);

            // Close keep-alive connections
            conn.disconnect();
        } catch (MalformedURLException e) {
            Log.d("SfvLug", "Invalid URL: " + location);
        } catch (IOException e) {
            Log.d("SfvLug", "Download failed for: " + location);
        }

        // Load text into JSON Object
        String text = TextUtils.join("", lines);
        try {
            return new JSONArray(text);
        } catch (JSONException e) {
            Log.d("SfvLug", "Invalid JSON Object: " + text);
            return null;
        }
    }

    /* Trigger a refresh of the meeting status */
    private void loadStatus() {
        // Set URI location
        String location = "http://52.33.120.235/juan.php";
        //peer-reader.ddns.net
        //ip: 52.33.120.235
        ourMessage.setText("Loading status.. ");

        new AsyncTask<String, Void, JSONArray>() {

            protected JSONArray doInBackground(String... args) {

                return MyTest.this.loadUrl(args[0]);
            }

            protected void onPostExecute(JSONArray status) {
                ourMessage.setText("Loading Post Execute.. ");
                MyTest.this.setStatus(status);
            }

        }.execute(location);
    }
}