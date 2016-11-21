window.onload = function() {
  loadMain(); // starting point
};


// otvara modal klikom na sliku (design-box)

function toggleModal(type) {
  var tmp = document.getElementById("design-img").getAttribute("src");
  document.getElementById("modal-img").src = tmp;
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

      document.getElementById(where).innerHTML +=
        this.responseText;

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

  loadPart("ajax/join-us-box.html", "main-page", function() {
    loadPart("ajax/main-page.html", "main-page", function() {
      loadPart("ajax/design-box.html", "design-wrap", function() {
        loadPart("ajax/forum-box.html", "forum-wrap")
      })
    })
  });
}

function loadProfile() {
  document.getElementById("main-page").innerHTML = "";

  loadPart("ajax/profile.html", "main-page", function() {
    loadPart("ajax/top-profile-info.html", "profile-wrap", function() {
      loadPart("ajax/design-box.html", "design-content", function() {
        loadPart("ajax/forum-box.html", "forum-content")
      })
    })
  });
}

function loadDesigns() {
  document.getElementById("main-page").innerHTML = "";
  loadPart("ajax/design-list.html", "main-page", function() {
    loadPart("ajax/design-box.html", "content-box")
  });
}

function loadDesignPost() {
  document.getElementById("main-page").innerHTML = "";
  loadPart("ajax/design-post.html", "main-page", function() {
    loadPart('ajax/big-design-box.html', "content-box", function() {
      loadPart('ajax/comment-box.html', "post-page")
    })
  });
}

function loadForum() {
  document.getElementById("main-page").innerHTML = "";
  loadPart("ajax/forum.html", "main-page", function() {
    loadPart("ajax/forum-box.html", "content-box")
  });
}

function loadForumPost() {
  document.getElementById("main-page").innerHTML = "";
  loadPart("ajax/forum-post.html", "main-page", function() {
    loadPart('ajax/forum-box.html', "content-box", function() {
      loadPart('ajax/comment-box.html', "post-page")
    })
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
  loadPart("ajax/login.html", "main-page");
}

function loadRegister() {
  document.getElementById("main-page").innerHTML = "";
  loadPart("ajax/register.html", "main-page");
}
