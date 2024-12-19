
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div id="player_form" class="form-container" >
  <h2>Player Form</h2>

  <form  method="POST" action="createN.php" id="formulaire_joueur" >
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" id="name" name="name" placeholder="Enter player name" required />
      <span id="name-error"></span>
    </div>
    <div class="form-group">
      <label for="photo">Photo</label>
      <input type="url" id="photo" name="photo" placeholder="Enter photo URL" />
      <span id="photo-error"></span>
    </div>

    <div class="form-group">
      <label for="nationality">Nationality</label>
      <input type="number" id="nationality" name="nationalityP" placeholder="Enter nationality" />
      <span id="nationality-error"></span>
    </div>
    <div class="form-group">
      <label for="flag">Flag</label>
      <input type="url" id="joueur_drapeau" name="flag" placeholder="Enter flag URL" />
      <span id="joueur_drapeau-error"></span>
    </div>
    <div class="form-group">
      <label for="logo">Logo</label>
      <input type="url" id="joueur_logo" name="logo" placeholder="Enter logo URL" />
      <span id="joueur_logo-error"></span>
    </div>
    <div class="form-group">
      <label for="club">Club</label>
      <input type="number" id="club" name="clubP" placeholder="Enter club name" />
      <span id="club-error"></span>
    </div>

    <div class="form-group">
      <label for="rating">Rating</label>
      <input type="number" id="rating" name="rating" placeholder="Enter player rating" min="0" max="100" />
      <span id="rating-error"></span>
    </div>

    <div class="form-group">
      <label for="position">Position</label>
      <select id="position" name="position">
        <option value="GK">GARDIEN</option>
        <option value="CBR">CENTER BACK RIGHT</option>
        <option value="CBL">CENTER BACK LEFT</option>
        <option value="LB">LEFT BACK</option>
        <option value="RB">REIGHT BACK</option>
        <option value="MDF">Midfield</option>
        <option value="MR">MILIEU RELAYEUR</option>
        <option value="MO">MILIEU OFFENSIF</option>
        <option value="LW">LEFT WINGER</option>
        <option value="ST">Striker (ST)</option>
        <option value="RW">REIGHT WINGER</option>
      </select>
    </div>
<div id="avis_player" style="display: none">
  <h3>Player Stats</h3>
  <div class="avis">
    <div class="form-group">
      <label for="player_pace" id="player_pace-label">Player Pace</label>
      <input type="number" id="player_pace" name="player_pace" placeholder="Enter player pace" min="0" max="100" />
    </div>
    <div class="form-group">
      <label for="player_shooting" id="player_shooting-label">Player Shooting</label>
      <input type="number" id="player_shooting" name="player_shooting" placeholder="Enter player shooting" min="0" max="100" />
    </div>
  </div>
  <div class="avis">
    <div class="form-group">
      <label for="player_passing" id="player_passing-label">Player Passing</label>
      <input type="number" id="player_passing" name="player_passing" placeholder="Enter player passing" min="0" max="100" />
    </div>
    <div class="form-group">
      <label for="player_dribbling" id="player_dribbling-label">Player Dribbling</label>
      <input type="number" id="player_dribbling" name="player_dribbling" placeholder="Enter player dribbling" min="0" max="100" />
    </div>
  </div>
  <div class="avis">
    <div class="form-group">
      <label for="player_defending" id="player_defending-label">Player Defending</label>
      <input type="number" id="player_defending" name="player_defending" placeholder="Enter player defending" min="0" max="100" />
    </div>
    <div class="form-group">
      <label for="player_physical" id="player_physical-label">Player Physical</label>
      <input type="number" id="player_physical" name="player_physical" placeholder="Enter player physical" min="0" max="100" />
    </div>
  </div>
</div>

<div id="avis_gardien" >
  <h3>Gardien Stats</h3>
  <div class="avis">
    <div class="form-group">
      <label for="gardien_diving" id="gardien_diving-label">Gardien Diving</label>
      <input type="number" id="gardien_diving" name="gardien_diving" placeholder="Enter gardien diving" min="0" max="100" />
    </div>
    <div class="form-group">
      <label for="gardien_handling" id="gardien_handling-label">Gardien Handling</label>
      <input type="number" id="gardien_handling" name="gardien_handling" placeholder="Enter gardien handling" min="0" max="100" />
    </div>
  </div>
  <div class="avis">
    <div class="form-group">
      <label for="gardien_kicking" id="gardien_kicking-label">Gardien Kicking</label>
      <input type="number" id="gardien_kicking" name="gardien_kicking" placeholder="Enter gardien kicking" min="0" max="100" />
    </div>
    <div class="form-group">
      <label for="gardien_reflexes" id="gardien_reflexes-label">Gardien Reflexes</label>
      <input type="number" id="gardien_reflexes" name="gardien_reflexes" placeholder="Enter gardien reflexes" min="0" max="100" />
    </div>
  </div>
  <div class="avis">
    <div class="form-group">
      <label for="gardien_speed" id="gardien_speed-label">Gardien Speed</label>
      <input type="number" id="gardien_speed" name="gardien_speed" placeholder="Enter gardien speed" min="0" max="100" />
    </div>
    <div class="form-group">
      <label for="gardien_positioning" id="gardien_positioning-label">Gardien Positioning</label>
      <input type="number" id="gardien_positioning" name="gardien_positioning" placeholder="Enter gardien positioning" min="0" max="100" />
    </div>
  </div>
</div>
<button type="submit"name="submit" class="btn-submit">Ajouter joueur</button>
</form>
</div>
<script>
                
            </script>
            <script src="dashboard.js"></script>
            <script src="players.js"></script>
            