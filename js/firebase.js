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
    apiKey: "AIzaSyCeNJqKv3wvsVxIg4CYPlQK4HdLcVKp9CA",
    authDomain: "postagid-63f6a.firebaseapp.com",
    databaseURL: "https://postagid-63f6a.firebaseio.com",
    projectId: "postagid-63f6a",
    storageBucket: "",
    messagingSenderId: "74661327687",
    appId: "1:74661327687:web:b39793b0eb4b9462b9d262",
    measurementId: "G-ESTGNMS8K0"
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);
firebase.analytics();

