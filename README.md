# 👽 Protocollo Apollo 26

**Protocollo Apollo 26** è un gioco testuale a scelte multiple in stile horror-sci-fi, ispirato alle atmosfere di *Alien* e *Moon*.  
Il giocatore si risveglia a bordo di una nave spaziale abbandonata e dovrà esplorare, risolvere enigmi e compiere scelte per trovare la via di fuga… prima che sia troppo tardi.

---

## 🧠 Caratteristiche principali

- ✅ Interamente sviluppato in **PHP puro** e **MySQL**
- 🧩 Struttura narrativa **ramificata**, con oltre 50 scene e **finali multipli**
- 🎮 Scelte gestite dinamicamente tramite **database**
- 🚀 **Deploy** su InfinityFree con importazione completa del DB da locale
- ✍️ Testi e sceneggiatura originali: un mix di scrittura creativa e logica di gioco

---

## 🕹️ Provalo online

🔗 [Gioca subito a Protocollo Apollo 26](https://phpfantasy.free.nf/escape-the-office/play.php?scene=1)

---

## 📁 Struttura del progetto

- `play.php` – pagina principale del gioco, recupera dinamicamente le scene
- `db.php` – connessione PDO al database
- `scenes` (tabella MySQL) – contiene testo, scelte e destinazioni
- `style.css` – stile base dell’interfaccia
- `/assets` – immagini e risorse statiche (se presenti)

---

## 🔧 Requisiti tecnici

- PHP >= 7.4
- MySQL 
- Server compatibile (testato su InfinityFree)

---

## 📌 Ispirazioni

- 🎥 *Alien* (Ridley Scott)  
- 🎥 *Moon* (Duncan Jones)  
- 📖 Libri-game / giochi testuali interattivi

---

## 👨‍💻 Autore

Creato da [Claudio Maldera](https://www.linkedin.com/in/claudio-maldera-1ba731266/)  
📫 Feedback, fork o pull request sono benvenuti!

---

## 🧪 TODO / Sviluppi futuri

- [ ] Aggiungere un sistema di salvataggio partita  
- [ ] Nuove scene e percorsi alternativi  
- [ ] Interfaccia mobile migliorata  
- [ ] Effetti sonori o ambientali per aumentare l'immersione

---

## 📝 Licenza

Questo progetto è open-source sotto licenza MIT.
