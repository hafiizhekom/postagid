var provider = new firebase.auth.GoogleAuthProvider();

provider.addScope('https://www.googleapis.com/auth/contacts.readonly');
provider.addScope('profile');
provider.addScope('email');
provider.addScope('https://www.googleapis.com/auth/plus.me');

provider.setCustomParameters({
'login_hint': 'user@example.com'
});

// Your web app's Firebase configuration
var firebaseConfig = {
    apiKey: "[api-key]",
    authDomain: "postagid-[xxx].firebaseapp.com",
    databaseURL: "https://postagid-[xxx].firebaseio.com",
    projectId: "postagid-[xxx]",
    storageBucket: "",
    messagingSenderId: "[messaging-sender-id]",
    appId: "[app-id]",
    measurementId: "G-XXXXXXX"
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);
firebase.analytics();

