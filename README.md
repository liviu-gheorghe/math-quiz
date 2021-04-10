### Instructiuni setup local

- Copiati folderul in root-ul webserver-ului 
  - In cazul in care aveti instalat WAMP, cel mai probabil este `c:\wamp\www`
  - In cazul in care aveti instalat XAMPP, cel mai probabil este `c:\xampp\htdocs`
- Modificati fisierul `db_credentials.txt` din folder si faceti modificari in cazul in care este nevoie(in cazul in care aveti alt user/pass) - acesta este un fisier care va fi folosit de un script PHP ce va face conexiunea cu baza de date
- Intrati intr-un CLI de MySQL(sau folositi phpMyAdmin in cazul in care aveti) si rulati, pe rand,query-urile din fisierul queries.sql
- Accesati http://localhost/math-quiz/app


P.S Pentru a putea folosi notatii matematice mai complexe am folosit libraria MathJax, pentru a adauga intrebari ce contin notatii precum integrale, sume, puteti cauta pe internet care este sintaxa(am adaugat si in proiect un exemplu gasit pe net, pentru a vedea despre ce e vorba puteti accesa http://127.0.0.1/math-quiz/app/mathjax_example.html)