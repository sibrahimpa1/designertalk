#

Designers talk

Forum za web dizajnere, graficke i logo dizajnere, ilustratore i ostale kreativce. Designers talk je mjesto za istrazivanje i promovisanje dizajna.

Spirala 1.
  - Svi zadaci su urađeni, nisam primjetila nijedan bug.
  - Lista fajlova:
   - index.php - početna stranica sa nekim osnovnim sadržajem
   - about.html - stranica na kojoj treba pisati nešto više o nama
   - contact.html - stranica sa kontakt formom
   - design-list.html - lista svih dizajnova, sa opcijama sortiranja
   - forum.html - lista svih forum postova sa opcijama sortiranja
   - design-post.html - detaljniji prikaz jednog dizajna
   - forum-post.html - detaljniji prikaz posta na forumu
   - login.html i register.html - stranice sa formama login i registraciju
   - profile.html - stranica profila korisnika

   - Css fajlovi su razvrstani i imenovani po stranicama, u main.css-u se nalazi sav css potreban za elemente koji se pojavljuju na više      stranica.


Spirala 2.

  - Sva polja formi imaju odgovarajuću JavaScript validaciju, poruka o grešci se ispisuje iznad submit buttona
  - Implementiran JS dropdown meni u headeru na mobilnim verzijama
  - Pošto će kroz cijelu stranicu biti jakno puno prikazanih 'design-box' elemenata implementirano je otvaranje modala klikom na sliku na design-boxu (gdje god ima prikaz dizajna na stranici osim na design-post podstranici gdje je slika već velikih dimenzija). Modal se može ugasiti na 'esc' dugme ili klikom na dugme u gornjem desnom ćošku.
  - Sve podstranice (kojima pristupamo iz headera ili pomoću 'see-more' linkova), te i neki elementi unutar tih podstranica, se učitavaju ajaxom
  - Nisam primjetila nijedan bug.
  - HTML fajlovi iz prethodne spirale su modifikovani i sada se nalaze u ajax folderu.

  - Lista fajlova:

   - about.html - svi elementi podstranice 'o nama'
   - big-design-box - veliki box koji se prikazuje samo na podstranici jednog dizajna
   - comment-box - prikazuje se na podstranici jednog dizajna i jednog forum posta
   - contact.html - svi elementi podstranice sa kontakt formom
   - design-box.html - prikaz malog design-boxa koji se loada na main page-u i u listi svi dizajnova
   - design-list.html - kontejner unutar kojeg ce biti izlistani svi boxovi dizajna na podstranici 'Designs' i 'Main page'
   - design-post.html - kontejner za veliki design box -> ovdje se ucitava 'big-design-box' i 'comment-box'

   - forum-post.html - kontejner za prikaz jednog forum boxa -> ovdje se ucitava 'forum-box' i 'comment-box'
   - forum-box.php - prikaz forum-boxa : na main page-u, u listi svi postova na forumu (podstranica 'Forum') i u podstranici jednog forum posta
   - forum.html - kontejner za listu svih postova na forumu

   - join-us-box.html - ucitava se na main stranici na samom pocetku stranice
   - login.html - svi elementi podstranice 'login'
   - main-page.html - kontejner za ucitavanje design-posta i forum-posta na pocetnoj stranici ispod join-us-boxa
   - profile.html - kontejner za ucitavanje top-profile-info boxa, design-boxa, i forum-boxa
   - top-profile-info.html - box koji sadrzi osnovne informacije o svakom profilu - slika, ime, opis, broj forum postova itd.
   - register.html - svi elementi podstranice 'register'


   - formValidation.js - validacija svih formi na stranici
   - main.js - ucitavanje svih podstranica ajaxom, dropdown meni, modal

   - index.php - pocetna stranica

Spirala 3.

  - Napravljena serijalizacija svih podataka (dizajn elementi, forum postovi i korisnici) u XML fajlove.
  - Samo admin za sada moze dodavati novi forum post i novi dizajn, kao i brisati iste (prilikom logina sa drugim korisnikom nece biti prikazana nigdje opcija za dodavanje/brisanje)
  - Moguca registracija novog korisnika
  - Admin podaci su zapisani u XML fajlu
  - Sve forme su validirane php-om
  - Samo admin moze vrsiti download podataka u csv formatu za forum postove i dizajneve ( na svakoj od stranica ima link u sub-headeru gdje je i search input )
  - Prilikom logina sa admin podacima, u headeru ce se pojaviti i link za skidanje fajla u csv i pdf formatima ( csv lista korisnika i pdf u kojem se nalazi lista dizajneva - analogno bi se uradilo i za forum postove i korisnike)
  - Uradjen je search za dizajneve i postove, potencijalni rezultati se pojavljuju ispod search inputa, ali nije uradjeno kada se klikne na dugme da se prikazu svi rezultati.
  - uradjen deployment stranice na OpenShiftu-u:




Ibrahimpasic Senka, 16511
