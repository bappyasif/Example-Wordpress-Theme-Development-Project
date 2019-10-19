console.log("Hello From main.js");

var portfolioPostsBtn = document.getElementById("portfolio-posts-btn");
var portfolioPostsContainer = document.getElementById("portfolio-posts-container");

if (portfolioPostsBtn) {
    
    portfolioPostsBtn.addEventListener("click", function() {
        console.log("Button Clicked");
        
        var ourRequest = new XMLHttpRequest();

        ourRequest.open('GET', postedData.siteURL+'/wp-json/wp/v2/posts?categories=11&order=asc');
        
        ourRequest.onload = function() {
            
          if (ourRequest.status >= 200 && ourRequest.status < 400) {
              
              var data = JSON.parse(ourRequest.responseText);
              
              createHTML(data);
              
              console.log(data);
              
              portfolioPostsBtn.remove();
              
          } else {
              
            console.log("We connected to the server, but it returned an error.");
          }
        };

        ourRequest.onerror = function() {
          console.log("Connection error");
        };

ourRequest.send();
        
    });
    
}

function createHTML(postsData) {
    
    var ourHTMLString = '';
    
    for (i=0; i<postsData.length; i++) {
        ourHTMLString += '<h2>' + postsData[i].title.rendered + '</h2>';
        ourHTMLString += postsData[i].content.rendered;
    }
    
    portfolioPostsContainer.innerHTML = ourHTMLString;
    
}

// Quick Add Post Ajax
var quickAddButton = document.querySelector("#quick-add-button");

if (quickAddButton) {
    quickAddButton.addEventListener("click", function() {
        
        var ourPostData = {
            "title": document.querySelector(".admin-quick-add [name='title']").nodeValue,
            "content": document.querySelector(".admin-quick-add [name='content']").nodeValue,
            "status": "publish"
        }
        
       var createPost = new XMLHttpRequest();
        createPost.open("POST", postedData.siteURL+"/wp-json/wp/v2/posts");
        
        createPost.setRequestHeader("X-WP-Nonce", postedData.nonce);
        
        createPost.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        
        //createPost.send(ourPostData);
        createPost.send(JSON.stringify(ourPostData));
        
        createPost.onreadystatechange = function() {
            if (createPost.readyState == 4) {
                if (createPost.status == 201) {
                    document.querySelector(".admin-quick-add [name='title']").nodeValue = '';
                    document.querySelector(".admin-quick-add [name='content']").nodeValue = '';
                } else {
                    alert("Error - Try Again");
                }
            }
        }
    });
}