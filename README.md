# 🌶️ HotSauces 🔥 – Projet Laravel

**HotSauces** est une application web développée avec **Laravel** dans le cadre de la ressource **R4.01 Architecture Logicielle** du **Semestre 4**. Elle permet aux utilisateurs d’ajouter leurs sauces préférées, de les liker ou disliker, et de consulter celles partagées par les autres.

---

## 🧰 Fonctionnalités

- ✅ Inscription et authentification des utilisateurs
- 🌶️ Ajout d'une nouvelle sauce avec image et description
- 📜 Affichage de toutes les sauces
- ✏️ Modification et suppression d’une sauce (par son créateur uniquement)
- 👍👎 Like / Dislike des sauces
- 📡 API REST complète pour gérer les sauces

---

## 🧱 Modèles de données

### 🧴 Sauce

| Champ         | Type    | Description                                  |
|---------------|---------|----------------------------------------------|
| `userId`      | String  | Identifiant unique du créateur               |
| `name`        | String  | Nom de la sauce                              |
| `manufacturer`| String  | Fabricant                                     |
| `description` | String  | Description complète                         |
| `mainPepper`  | String  | Ingrédient principal                         |
| `imageUrl`    | String  | URL de l’image                               |
| `heat`        | Number  | Niveau de piquant (1 à 10)                   |
| `likes`       | Number  | Nombre de likes                              |
| `dislikes`    | Number  | Nombre de dislikes                           |
| `usersLiked`  | Array   | Liste des IDs des utilisateurs ayant liké   |
| `usersDisliked`| Array  | Liste des IDs des utilisateurs ayant disliké|

### 👤 Utilisateur

| Champ     | Type   | Description                      |
|-----------|--------|----------------------------------|
| `email`   | String | Adresse email unique             |
| `password`| String | Mot de passe (haché)             |

---
