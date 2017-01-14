window.onload = function() {
  loadMain(); // starting point
};

// search bar for designs

function showSearch(input) {
  if(input.length < 2) {
    document.getElementById("search-dropdown").innerHTML = "";
    return;
  }

  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
          document.getElementById("search-dropdown").innerHTML = xmlhttp.responseText;
      if (xmlhttp.readyState == 4 && xmlhttp.status == 404)
          document.getElementById("search-dropdown").innerHTML = "error";
  }

  xmlhttp.open("GET","php/search.php?q="+input,true);
  xmlhttp.send();
}


function showSearchPosts(input) {
  if(input.length < 2) {
    document.getElementById("search-dropdown").innerHTML = "";
    return;
  }

  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
          document.getElementById("search-dropdown").innerHTML = xmlhttp.responseText;
      if (xmlhttp.readyState == 4 && xmlhttp.status == 404)
          document.getElementById("search-dropdown").innerHTML = "error";
  }

  xmlhttp.open("GET","php/findPosts.php?q="+input,true);
  xmlhttp.send();
}


// otvara modal klikom na sliku (design-box)

function toggleModal(type, src) {

  document.getElementById("modal-img").src = src;
  document.getElementById('modal').className = 'modal' + (type === 'show' ? ' modal-visible' : '');

  if (type === 'show') {
    document.getElementById("body").style.overflow = "hidden";
  } else {
    document.getElementById("body").style.overflow = "auto";
  }
}

// gasi modal na esc
window.onkeydown = function(e) {
  if (e.keyCode === 27) {
    toggleModal('hide');
  }
}

// header dropdown list - na mobilnoj verziji
function dropdownToggle() {
  document.getElementById("dropdown").classList.toggle('show-menu');
}

// hide dropdown kad se klikne bilo gdje na stranici osim na link
window.onclick = function() {
  if (!event.target.matches('.open-dropdown') && !event.target.matches('.dropdown ul li a')) {
    if (document.getElementById("dropdown").classList.contains('show-menu')) {
      document.getElementById("dropdown").classList.remove('show-menu');
    }
  }
}

// ajax call za svaku podstranicu/element na stranici
function loadPart(content, where, cb) {
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

      document.getElementById(where).innerHTML +=  this.responseText;

      if (typeof cb === "function") {
        cb();
      }
    }
  };

  xhttp.open("GET", content, true);
  xhttp.send();
}

// svaka f-ja posebno loada potrebne dijelove stranice

function loadMain() {
  document.getElementById("main-page").innerHTML = "";
  loadPart("php/join-us-box.php", "main-page", function() {
    loadPart("ajax/main-page.html", "main-page", function() {
      loadPart("php/design-box.php", "design-wrap", function() {
        loadPart("php/forum-list.php", "forum-wrap")
      })
    })
  });
}

function loadProfile() {
  document.getElementById("main-page").innerHTML = "";

  loadPart("ajax/profile.html", "main-page", function() {
    loadPart("ajax/top-profile-info.html", "profile-wrap", function() {
      loadPart("php/design-box.php", "design-content", function() {
        loadPart("php/forum-box.php", "forum-content")
      })
    })
  });
}

function loadDesigns(write) {
  if (write) {
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          console.log("Post Submitted");

        }
    };
    designTitle = document.getElementById('title').value;
    designCategory = document.getElementById('category').value;
    pic = document.getElementById('image').value;
    params = "designTitle=" + designTitle + "&designCategory=" + designCategory + "pic" + pic;

    xhttp.open("POST", 'php/design-list.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.send(params);
  }

  document.getElementById("main-page").innerHTML = "";
  loadPart("php/design-list.php", "main-page", function() {
    loadPart("php/design-box.php", "content-box")
  });
}

function deleteDesign(id, write) {
  if (write) {
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          console.log("Post deleted");
        }
    };
    params = "id=" + id;
    xhttp.open("POST", 'php/deleteDesign.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(params);
  }
  document.getElementById("main-page").innerHTML = "";
  loadPart("php/design-list.php", "main-page", function() {
    loadPart("php/design-box.php", "content-box")
  });
}

function loadDesignPost(id, write) {
  document.getElementById("main-page").innerHTML = "";
  loadPart("php/design-post.php?q="+id, "main-page", function() {
      loadPart("php/design-comment.php?q="+id, "post-page")
  });
}

function loadForum(write) {
  if (write) {
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          console.log("Post Submitted");
        }
    };
    postTitle = document.getElementById('title').value;
    postDesc = document.getElementById('content').value;
    postCat = document.getElementById('category').value;
    params = "postTitle=" + postTitle + "&postDesc=" + postDesc + "&postCategory=" + postCat;

        xhttp.open("POST", 'php/forum.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.send(params);
  }
  document.getElementById("main-page").innerHTML = "";
  loadPart("php/forum.php", "main-page", function() {
    loadPart("php/forum-list.php", "content-box")
  });
}


function deleteForum(id, write) {
  if (write) {
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          console.log("Post deleted");
        }
    };


    params = "id=" + id;

    xhttp.open("POST", 'php/deletePost.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.send(params);
  }
  document.getElementById("main-page").innerHTML = "";
  loadPart("php/forum.php", "main-page", function() {
    loadPart("php/forum-list.php", "content-box")
  });
}


function loadForumPost(id, write) {
  document.getElementById("main-page").innerHTML = "";
  loadPart("php/forum-post.php?q="+id, "main-page", function() {
      loadPart("php/forum-comment.php?q="+id, "post-page")
  });

}

function loadAbout() {
  document.getElementById("main-page").innerHTML = "";
  loadPart("ajax/about.html", "main-page");
}

function loadContact() {
  document.getElementById("main-page").innerHTML = "";
  loadPart("ajax/contact.html", "main-page");
}

function loadLogin() {
  document.getElementById("main-page").innerHTML = "";
  loadPart("php/login.php", "main-page");
}

function loadRegister() {
  document.getElementById("main-page").innerHTML = "";
  loadPart("php/register.php", "main-page");
}
