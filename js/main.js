window.onload = function() {
  loadMain();
};

function toggleModal(type) {
  var tmp = document.getElementById("design-img").getAttribute("src");
  document.getElementById("modal-img").src = tmp;
  document.getElementById('modal').className = 'modal' + (type === 'show' ? ' modal-visible' : '');

  if(type==='show'){
    document.getElementById("body").style.overflow = "hidden";
  }
  else{
      document.getElementById("body").style.overflow = "auto";
  }
}

window.onkeydown = function(e) {
  if(e.keyCode === 27) {
    toggleModal('hide');
  }
}

function dropdownToggle(){
  document.getElementById("dropdown").classList.toggle('show-menu');
}

window.onclick = function(){
  if(!event.target.matches('.open-dropdown') && !event.target.matches('.dropdown ul li a')){
    if(document.getElementById("dropdown").classList.contains('show-menu')){
      document.getElementById("dropdown").classList.remove('show-menu');
    }
  }
}

function loadPart(content, where) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById(where).innerHTML +=
        this.responseText;
    }
  };
  xhttp.open("GET", content, true);
  xhttp.send();
}

function loadMain() {
  document.getElementById("main-page").innerHTML = "";

  loadPart("ajax/join-us-box.html", "main-page");
  loadPart("ajax/main-page.html", "main-page");
  loadPart("ajax/design-box.html", "design-wrap");
  loadPart("ajax/forum-box.html", "forum-wrap");
}

function loadProfile() {
  document.getElementById("main-page").innerHTML = "";

  loadPart("ajax/profile.html", "main-page");
  loadPart("ajax/top-profile-info.html", "profile-wrap");
  loadPart("ajax/design-box.html", "design-content");
  loadPart("ajax/forum-box.html", "forum-content");
}

function loadDesigns() {
  document.getElementById("main-page").innerHTML = "";
  loadPart("ajax/design-list.html", "main-page");
  loadPart("ajax/design-box.html", "content-box");
}

function loadDesignPost() {
  document.getElementById("main-page").innerHTML = "";
  loadPart("ajax/design-post.html", "main-page");
  loadPart('ajax/big-design-box.html', "content-box");
  loadPart('ajax/comment-box.html', "post-page");

}

function loadForum() {
  document.getElementById("main-page").innerHTML = "";
  loadPart("ajax/forum.html", "main-page");
  loadPart("ajax/forum-box.html", "content-box");
}

function loadForumPost() {
  document.getElementById("main-page").innerHTML = "";
  loadPart("ajax/forum-post.html", "main-page");
  loadPart('ajax/forum-box.html', "content-box");
  loadPart('ajax/comment-box.html', "post-page");

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
