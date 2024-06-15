<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.1/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.6.1/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyDBkmSn9WCCGMYN2LWoD4Y7Qz2i7rwlm3s",
    authDomain: "jtsimaset.firebaseapp.com",
    databaseURL: "https://jtsimaset-default-rtdb.asia-southeast1.firebasedatabase.app",
    projectId: "jtsimaset",
    storageBucket: "jtsimaset.appspot.com",
    messagingSenderId: "42070138543",
    appId: "1:42070138543:web:fef1802cb6ae17eb567e5a",
    measurementId: "G-65WLEJPJMV"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
</script>