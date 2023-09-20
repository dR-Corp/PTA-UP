# PTA-UP
# Suivi de la réalisation des activités et actions du plan de travail annuel de l'UP

## Tables

- ************Annee************ (ID, code, libelle)
- **Users** (id, username, password, #structure_ID, role)
    - role : user et superuser (1, 2)
- **Sous_Programme** (ID, libelle)
    - Les sous programmes seront directement enregistrés dans la base de données
- **Objectifs_Spécifiques** (ID, libelle, #ID_Sous_Programme, poids_FP, poids_BN)
- **Actions** (ID, libelle, #ID_Objectif_Specifique, poids_FP, poids_BN)
- **Activites** (ID, libelle, #ID_Action, poids_FP, poids_BN)
- **Taches** (ID, libelle, #ID_Activite, indicateurs, imputation_Budget, montant_FP, montant_BN, periode, poids_FP, poids_BN, structure_Responsable, structure_Associee, mode_Execution, observation, realiser, montant_Engage)
- **Valider** (annee_ID, structure_ID, validation)

## Année
Les données manipulées sont donc fonction de l'année