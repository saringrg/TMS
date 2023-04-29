// Import required Firebase services
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.18.0/firebase-app.js";
import { Firestore, 
		 getFirestore, 
		 onSnapshot, 
		 query, 
		 collection, 
		 orderBy,
		 addDoc } from 'https://www.gstatic.com/firebasejs/9.18.0/firebase-firestore.js'


// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyD_CAXCzYzfB5RRh9vMBIEk36b5e1Z4nAw",
  authDomain: "cs022-2204974.firebaseapp.com",
  projectId: "cs022-2204974",
  storageBucket: "cs022-2204974.appspot.com",
  messagingSenderId: "617051539979",
  appId: "1:617051539979:web:9da53d656da8f5379d550e",
  measurementId: "G-C0QQLY84HJ"
};


// Initialize Firebase
const app = initializeApp(firebaseConfig);	
const db = getFirestore(app);	

// Get a live data snapshot (i.e. auto-refresh) of our Reviews collection
const q = query(collection(db, "Reviews"), orderBy("book_name"));
const unsubscribe = onSnapshot(q, (snapshot) => {


  // Empty HTML table
  $('#reviewList').empty();
	
  // Loop through snapshot data and add to HTML table
  var tableRows = '';
  snapshot.forEach((doc) => {
	tableRows += '<tr>';
	tableRows += '<td>'  + doc.data().book_name + '</td>';
	tableRows += '<td>'  + doc.data().book_rating + '/5</td>';
	tableRows += '</tr>';	  
  });
  $('#reviewList').append(tableRows);
	
  // Display review count
  $('#mainTitle').html(snapshot.size + " book reviews in the list");
});	



