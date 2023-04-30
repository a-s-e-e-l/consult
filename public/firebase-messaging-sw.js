// /*
// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here, other Firebase libraries are not available in the service worker.
// */
// importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
// importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-messaging.js');
//
// /*
// Initialize the Firebase app in the service worker by passing in the messagingSenderId.
// * New configuration for app@pulseservice.com
// */
// firebase.initializeApp({
//     apiKey: "AIzaSyBZCNXrTNmvQs80cDUD3ANc9IYOAIhXVnY",
//     authDomain: "first-35e36.firebaseapp.com",
//     projectId: "first-35e36",
//     storageBucket: "first-35e36.appspot.com",
//     messagingSenderId: "193846580701",
//     appId: "1:193846580701:web:b5f6231ccceecf008cd234",
//     measurementId: "G-62L6QLD0BB"
// });
//
// /*
// Retrieve an instance of Firebase Messaging so that it can handle background messages.
// */
// const messaging = firebase.messaging();
// messaging.setBackgroundMessageHandler(function(payload) {
//     console.log(
//         "[firebase-messaging-sw.js] Received background message ",
//         payload,
//     );
//     /* Customize notification here */
//     const notificationTitle = "Background Message Title";
//     const notificationOptions = {
//         body: "Background Message body.",
//         icon: "/itwonders-web-logo.png",
//     };
//
//     return self.registration.showNotification(
//         notificationTitle,
//         notificationOptions,
//     );
// });


importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');

firebase.initializeApp({
    apiKey: "AIzaSyBZCNXrTNmvQs80cDUD3ANc9IYOAIhXVnY",
    authDomain: "first-35e36.firebaseapp.com",
    projectId: "first-35e36",
    storageBucket: "first-35e36.appspot.com",
    messagingSenderId: "193846580701",
    appId: "1:193846580701:web:b5f6231ccceecf008cd234",
    measurementId: "G-62L6QLD0BB"
});

const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function({data:{title,body,icon}}) {
    return self.registration.showNotification(title,{body,icon});
});
