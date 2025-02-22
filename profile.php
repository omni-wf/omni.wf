<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
	<title>Profile Viewer | browse.wf</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="icon" href="https://browse.wf/Lotus/Interface/Icons/Categories/GrimoireModIcon.png">
	<style>
		.form-select
		{
			display: inline-block;
			width: fit-content;
		}

		.colour-blob
		{
			display: inline-block;
			height: 1em;
			width: 1em;
			position: relative;
			top: 3px;
			left: -1px;
		}

		.hide-if-none-slotted:not(:has(> ul:first-of-type > li:not(.d-none)))
		{
			display: none;
		}
	</style>
</head>
<body data-bs-theme="dark">
	<?php require "components/navbar.php"; ?>
	<div class="container pt-3">
		<div class="alert alert-warning" role="alert">
			As of update 38.0.8, it is no longer possible to get profile information via username. To use this tool, you now need an account id. To find your own account id, open your EE.log (<code>%localappdata%\Warframe\EE.log</code>) and look for "Logged in" — your account id will be in the parentheses.
		</div>
		<form class="input-group mb-3" onsubmit="event.preventDefault();doLookup();">
			<input id="username" type="text" class="form-control" value="" placeholder="Account ID" />
			<span class="input-group-text">on</span>
			<select id="platform" class="form-control">
				<option value="pc">PC</option>
				<option value="ps4">PlayStation</option>
				<option value="xb1">Xbox</option>
				<option value="swi">Switch</option>
				<option value="mob">Mobile</option>
			</select>
			<input type="submit" class="btn btn-primary" />
		</form>
		<div id="status" class="alert alert-light"><div class="spinner-border spinner-border-sm me-2"></div><span>Loading</span></div>
		<h3 class="mb-0"><span id="profile-name"></span><span class="text-body-secondary" id="profile-discriminator"></span></h3>
		<p id="mr" class="mb-1 d-none">Mastery Rank <b></b>, Registered <span></span></p>
		<p id="accolades" class="mb-1 d-none"><b>Accolades:</b> <span></span></p>
		<p id="clan" class="mb-1 d-none"><b>Clan:</b> <span></span></p>
		<ul id="profile-nav" class="nav nav-underline d-none">
			<li class="nav-item"><a class="nav-link" href="#" data-tab="fashion" onclick="tabulate(this, event)">Fashion</a></li>
			<li class="nav-item"><a class="nav-link active" href="#" data-tab="syndicates" onclick="tabulate(this, event)">Syndicates</a></li>
			<li class="nav-item"><a class="nav-link" href="#" data-tab="missions" onclick="tabulate(this, event)">Missions</a></li>
			<li class="nav-item"><a class="nav-link" href="#" data-tab="achievements" onclick="tabulate(this, event)">Achievements</a></li>
			<li class="nav-item"><a class="nav-link" href="#" data-tab="stats" onclick="tabulate(this, event)">Stats</a></li>
		</ul>
		<div id="syndicates" class="tab row p-2 d-none"></div>
		<div id="achievements" class="tab row p-2 d-none"></div>
		<div id="missions" class="tab pt-2 d-none">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Location</th>
						<th>Completions</th>
						<th>Steel Path</th>
						<th>Note</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
		<div id="fashion" class="tab row pt-2 d-none">
			<div class="col-md-6">
				<h4>Warframe: <span id="Suits-name"></span> <select id="Suits-config" class="form-select" onchange="updateFashion();"></select></h4>
				<ul>
					<li id="Suits-skin-0" class="d-none">Helmet: <span></span></li>
					<li id="Suits-skin-7" class="d-none">Skin: <span></span></li>
					<li id="Suits-skin-5" class="d-none">Animation Set: <span></span></li>
				</ul>
				<h6>Material Structures & Colors</h6>
				<ul>
					<li>
						<span id="Suits-pricol-t0">Primary: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></span>
						<ul>
							<li id="Suits-skin-17" class="d-none">Material Structure: <span></span></li>
						</ul>
					</li>
					<li>
						<span id="Suits-pricol-t1">Secondary: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></span>
						<ul>
							<li id="Suits-skin-18" class="d-none">Material Structure: <span></span></li>
						</ul>
					</li>
					<li>
						<span id="Suits-pricol-t2">Tertiary: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></span>
						<ul>
							<li id="Suits-skin-19" class="d-none">Material Structure: <span></span></li>
						</ul>
					</li>
					<li>
						<span id="Suits-pricol-t3">Accents: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></span>
						<ul>
							<li id="Suits-skin-20" class="d-none">Material Structure: <span></span></li>
						</ul>
					</li>
					<li id="Suits-pricol-m0">Emissive 1: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
					<li id="Suits-pricol-m1">Emissive 2: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
					<li id="Suits-pricol-en">Energy 1: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
					<li id="Suits-pricol-e1">Energy 2: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
				</ul>
				<div class="hide-if-none-slotted">
					<h5>Attachments</h5>
					<ul>
						<li id="Suits-skin-8" class="d-none">Chest: <span></span></li>
						<li id="Suits-skin-1" class="d-none">Left Shoulder: <span></span></li>
						<li id="Suits-skin-9" class="d-none">Right Shoulder: <span></span></li>
						<li id="Suits-skin-16" class="d-none">Ephemera: <span></span></li>
						<li id="Suits-skin-2" class="d-none">Left Leg: <span></span></li>
						<li id="Suits-skin-10" class="d-none">Right Leg: <span></span></li>
						<li id="Suits-skin-11" class="d-none">Auxiliary: <span></span></li>
						<li id="Suits-skin-16" class="d-none">Ephemera: <span></span></li>
						<li id="Suits-skin-25" class="d-none">Signa: <span></span></li>
					</ul>
					<h6>Colors</h6>
					<ul>
						<li id="Suits-attcol-t0">Primary: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						<li id="Suits-attcol-t1">Secondary: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						<li id="Suits-attcol-t2">Tertiary: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						<li id="Suits-attcol-t3">Accents: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						<li id="Suits-attcol-m0">Emissive 1: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						<li id="Suits-attcol-m1">Emissive 2: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						<li id="Suits-attcol-en">Energy 1: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						<li id="Suits-attcol-e1">Energy 2: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
					</ul>
				</div>
				<div id="Suits-skin-6">
					<h5>Syandana: <span></span></h5>
					<ul>
						<li id="Suits-syancol-t0">Primary: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						<li id="Suits-syancol-t1">Secondary: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						<li id="Suits-syancol-t2">Tertiary: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						<li id="Suits-syancol-t3">Accents: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						<li id="Suits-syancol-m0">Emissive 1: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						<li id="Suits-syancol-m1">Emissive 2: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						<li id="Suits-syancol-en">Energy 1: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						<li id="Suits-syancol-e1">Energy 2: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
					</ul>
				</div>
				<div class="hide-if-none-slotted">
					<h5>Sigils</h5>
					<ul>
						<li id="Suits-skin-3" class="d-none">Left Sigil: <span></span></li>
						<li id="Suits-skin-4" class="d-none">Right Sigil: <span></span></li>
						<li id="Suits-skin-12" class="d-none">
							Front Sigil: <span></span>
							<ul>
								<li id="Suits-sigcol-t0">Color 1: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
								<li id="Suits-sigcol-m0">Color 2: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
							</ul>
						</li>
						<li id="Suits-skin-13" class="d-none">
							Back Sigil: <span></span>
							<ul>
								<li id="Suits-sigcol-t2">Color 1: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
								<li id="Suits-sigcol-m1">Color 2: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-md-6">
				<div id="LongGuns-div">
					<h4>Primary: <span id="LongGuns-name"></span> <select id="LongGuns-config" class="form-select" onchange="updateFashion();"></select></h4>
					<ul>
						<li id="LongGuns-hide">Hidden When Holstered</li>
						<li id="LongGuns-skin-0">Skin: <span></span></li>
						<li id="LongGuns-pricol-t0">Primary: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						<li id="LongGuns-pricol-t1">Secondary: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						<li id="LongGuns-pricol-t2">Tertiary: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						<li id="LongGuns-pricol-t3">Accents: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						<li id="LongGuns-pricol-m0">Emissive 1: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						<li id="LongGuns-pricol-m1">Emissive 2: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						<li id="LongGuns-pricol-en">Energy 1: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						<li id="LongGuns-pricol-e1">Energy 2: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
					</ul>
				</div>
				<div id="Pistols-div">
					<h4>Secondary: <span id="Pistols-name"></span> <select id="Pistols-config" class="form-select" onchange="updateFashion();"></select></h4>
					<ul>
						<li id="Pistols-hide">Hidden When Holstered</li>
						<li id="Pistols-skin-0">Skin: <span></span></li>
						<li id="Pistols-pricol-t0">Primary: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						<li id="Pistols-pricol-t1">Secondary: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						<li id="Pistols-pricol-t2">Tertiary: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						<li id="Pistols-pricol-t3">Accents: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						<li id="Pistols-pricol-m0">Emissive 1: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						<li id="Pistols-pricol-m1">Emissive 2: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						<li id="Pistols-pricol-en">Energy 1: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						<li id="Pistols-pricol-e1">Energy 2: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
					</ul>
				</div>
				<div id="Melee-div">
					<h4>Melee: <span id="Melee-name"></span> <select id="Melee-config" class="form-select" onchange="updateFashion();"></select></h4>
					<ul>
						<li id="Melee-hide">Hidden When Holstered</li>
						<li id="Melee-skin-0">Skin: <span></span></li>
						<li id="Melee-skin-2">Holster Style: <span></span></li>
						<li id="Melee-pricol-t0">Primary: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						<li id="Melee-pricol-t1">Secondary: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						<li id="Melee-pricol-t2">Tertiary: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						<li id="Melee-pricol-t3">Accents: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						<li id="Melee-pricol-m0">Emissive 1: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						<li id="Melee-pricol-m1">Emissive 2: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						<li id="Melee-pricol-en">Energy 1: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						<li id="Melee-pricol-e1">Energy 2: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
					</ul>
					<div id="Melee-skin-6">
						<h5>Attachment: <span></span></h5>
						<ul>
							<li id="Melee-attcol-t0">Primary: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
							<li id="Melee-attcol-t1">Secondary: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
							<li id="Melee-attcol-t2">Tertiary: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
							<li id="Melee-attcol-t3">Accents: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
							<li id="Melee-attcol-m0">Emissive 1: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
							<li id="Melee-attcol-m1">Emissive 2: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
							<li id="Melee-attcol-en">Energy 1: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
							<li id="Melee-attcol-e1">Energy 2: <span class="hex"></span> <span class="colour-blob"></span> <span class="palettes"></span></li>
						</ul>
					</div>
				</div>
			</div>
			<!--<div>
				<h3>Operator</h3>
				<ul>
					<li id="Operator-skin-0">Head: <span></span></li>
					<li id="Operator-skin-1">Body: <span></span></li>
					<li id="Operator-skin-2">Hair: <span></span></li>
					<li id="Operator-skin-3">Face Markings: <span></span></li>
					<li id="Operator-skin-4">Signia(?): <span></span></li>
					<li id="Operator-skin-5">Hood: <span></span></li>
					<li id="Operator-skin-6">Suit: <span></span></li>
					<li id="Operator-skin-7">Sleeves: <span></span></li>
					<li id="Operator-skin-8">Legging: <span></span></li>
					<li id="Operator-skin-9">Voice: <span></span></li>
					<li id="Operator-skin-10">Skirt: <span></span></li>
					<li id="Operator-skin-11">Animation Set: <span></span></li>
					<li id="Operator-skin-12">Sigil: <span></span></li>
					<li id="Operator-skin-13">Head 2: <span></span></li>
					<li id="Operator-skin-14">Earrings: <span></span></li>
					<li id="Operator-skin-15">Glasses: <span></span></li>
					<li id="Operator-skin-16">Ephemera: <span></span></li>
				</ul>
			</div>-->
		</div>
		<div id="stats" class="tab pt-2 d-none">
			<div class="row">
				<div class="col-md-4">
					<span class="d-block">Time Played: <span id="stat-TimePlayedSec"></span></span>
					<span class="d-block">Gross Income: <span id="stat-Income"></span></span>

					<span class="d-block">Revives: <span id="stat-ReviveCount"></span></span>
					<span class="d-block">Heals: <span id="stat-HealCount"></span></span>
					<span class="d-block">Deaths: <span id="stat-Deaths"></span></span>
					<!--<span class="d-block">Melee Kills: <span id="stat-MeleeKills"></span></span>-->
				</div>
				<div class="col-md-4">
					<span class="d-block">Missions Completed: <span id="stat-MissionsCompleted"></span></span>
					<span class="d-block">Missions Failed: <span id="stat-MissionsFailed"></span></span>
					<span class="d-block">Missions Quit: <span id="stat-MissionsQuit"></span></span>
					<span class="d-block">Missions Interrupted: <span id="stat-MissionsInterrupted"></span></span>
					<span class="d-block">Missions Dumped: <span id="stat-MissionsDumped"></span></span>
				</div>
				<div class="col-md-4">
					<span class="d-block">Ciphers Solved: <span id="stat-CiphersSolved"></span></span>
					<span class="d-block">Ciphers Failed: <span id="stat-CiphersFailed"></span></span>
					<span class="d-block">Total Cipher Time: <span id="stat-CipherTime"></span></span>
					<span class="d-block">Average Cipher Time: <span id="stat-CipherTimeAvg"></span></span>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-lg-6">
					<h4>Equipment</h4>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Item</th>
								<th>Hours</th>
								<th>Kills</th>
								<th><abbr title="Headshots">H.S.</abbr></th>
								<th>Assists</th>
								<th>Affinity</th>
							</tr>
						</thead>
						<tbody id="equipment-stats"></tbody>
					</table>
				</div>
				<div class="col-lg-6">
					<h4>Enemies</h4>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Enemy</th>
								<th>Kills</th>
								<th>Assists</th>
								<th><abbr title="Headshots">H.S.</abbr></th>
								<th><abbr title="Finishers">Fin.</abbr></th>
								<th>Deaths</th>
								<th>Scans</th>
							</tr>
						</thead>
						<tbody id="enemy-stats"></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php require "components/commonjs.html"; ?>
	<script src="https://pluto-lang.org/wasm-builds/out/libpluto/0.9.5/libpluto.js"></script>
	<script src="https://pluto-lang.org/PlutoScript/plutoscript.js"></script>
	<script>
		const platform_suffix_pluto_promise = pluto_require("platform-suffix.pluto");

		/*document.getElementById("username").onfocus = function()
		{
			this.select();
		};*/

		const guideTiers = [0, "Junior Guide of the Lotus", "Senior Guide of the Lotus"];
		const founderTiers = [0, "Disciple", "Hunter", "Master", "Grand Master"];
		const clanTiers = [0, "Ghost", "Shadow", "Storm", "Mountain", "Moon"];
		const syndicateTags = [
			"ArbitersSyndicate",
			"CephalonSudaSyndicate",
			"PerrinSyndicate",
			"NewLokaSyndicate",
			"RedVeilSyndicate",
			"SteelMeridianSyndicate",

			"CetusSyndicate",
			"QuillsSyndicate",

			"SolarisSyndicate",
			"VentKidsSyndicate",
			"VoxSyndicate",

			"ZarimanSyndicate",

			"EntratiSyndicate",
			"NecraloidSyndicate",
			"EntratiLabSyndicate",
			"HexSyndicate",

			"KahlSyndicate",
			"NIGHTWAVE",
			"LibrarySyndicate",
			"ConclaveSyndicate",
			"EventSyndicate",
		];
		const vallisRaceNames = [0, "Puffin’ Pastures", "Bomb the Spaceport", "Shaving Nef", "Anyo’s Ointment", "Grinding the Void", "Fortuna’s Folley", "Taxman’s Curve", "Kubrodon Twist", "Mumsie Dadsie", "Catalyst", "Skeggin’ Out", "Deathgrip", "Dog Line", "River Run", "The Hard Way", "Sky-Eye", "Pobber’s Drop", "Lord of the Board", "Breakdown Or Bust", "Frost Merchant", "Roky’s Roll", "Meat and Greet"];
		const platformNames = {
			"pc": "PC",
			"ps4": "PlayStation",
			"xb1": "Xbox",
			"swi": "Switch",
			"mob": "Mobile",
		};

		function peColourToHex(colour)
		{
			return "#" + colour.value.substr(4);
		}

		function peColourToRgb(colour)
		{
			return [
				parseInt(colour.value.substr(4, 2), 16),
				parseInt(colour.value.substr(6, 2), 16),
				parseInt(colour.value.substr(8, 2), 16)
			];
		}

		function parseRgbaInt(val)
		{
			return [
				(val >> 16) & 0xff,
				(val >> 8) & 0xff,
				val & 0xff,
				(val >> 24) & 0xff
			];
		}

		function toHexString(r, g, b)
		{
			return "#" + (r.toString(16).padStart(2, "0") + g.toString(16).padStart(2, "0") + b.toString(16).padStart(2, "0")).toUpperCase();
		}

		function makeColourFilter(colour)
		{
			const [red, green, blue] = peColourToRgb(colour);
			const svg = `<svg xmlns="http://www.w3.org/2000/svg"><filter id="a"><feColorMatrix color-interpolation-filters="sRGB" in="SourceGraphic" type="matrix" values="${red / 255} 0 0 0 0 0 ${green / 255} 0 0 0 0 0 ${blue / 255} 0 0 0 0 0 1 0" /></filter></svg>`;
			return "url('data:image/svg+xml," + svg + "#a')";
		}

		function makeSyndicateLogoElement(syndicate)
		{
			const div = document.createElement("div");
			div.style.backgroundColor /* [sic] */ = peColourToHex(syndicate.backgroundColour);
			{
				const img = document.createElement("img");
				img.src = "https://browse.wf" + syndicate.icon;
				img.style.filter = makeColourFilter(syndicate.colour);
				div.appendChild(img);
			}
			return div;
		}

		const params = new URLSearchParams(location.hash.replace("#", ""));
		let initialDataUrl = "supplemental-data/profile-[DE]Rebecca.json";
		if (params.has("account"))
		{
			initialDataUrl = "https://conduit.browse.wf/profilebyid?account=" + encodeURIComponent(params.get("account"));
			window.hashprefix = "account=" + encodeURIComponent(params.get("account")) + "&";
			if (params.has("platform"))
			{
				initialDataUrl += "&platform=" + params.get("platform");
				window.hashprefix += "platform=" + params.get("platform") + "&";
			}
		}
		else
		{
			window.hashprefix = "";
		}
		if (params.has("platform"))
		{
			document.getElementById("platform").value = params.get("platform");
		}

		Promise.all([
			getDictPromise(),
			fetch("https://browse.wf/warframe-public-export-plus/ExportAchievements.json").then(res => res.json()),
			fetch("https://browse.wf/warframe-public-export-plus/ExportCustoms.json").then(res => res.json()),
			fetch("https://browse.wf/warframe-public-export-plus/ExportEnemies.json").then(res => res.json()),
			fetch("https://browse.wf/warframe-public-export-plus/ExportFlavour.json").then(res => res.json()),
			fetch("https://browse.wf/warframe-public-export-plus/ExportNightwave.json").then(res => res.json()),
			fetch("https://browse.wf/warframe-public-export-plus/ExportRegions.json").then(res => res.json()),
			fetch("https://browse.wf/warframe-public-export-plus/ExportSentinels.json").then(res => res.json()),
			fetch("https://browse.wf/warframe-public-export-plus/ExportSyndicates.json").then(res => res.json()),
			fetch("https://browse.wf/warframe-public-export-plus/ExportWarframes.json").then(res => res.json()),
			fetch("https://browse.wf/warframe-public-export-plus/ExportWeapons.json").then(res => res.json()),
			fetch(initialDataUrl).then(res => res.json())
			]).then(([
				dict,
				ExportAchievements,
				ExportCustoms,
				ExportEnemies,
				ExportFlavour,
				ExportNightwave,
				ExportRegions,
				ExportSentinels,
				ExportSyndicates,
				ExportWarframes,
				ExportWeapons,
				profile
			]) =>
		{
			window.dict = dict;
			window.ExportAchievements = ExportAchievements;
			window.ExportCustoms = ExportCustoms;
			window.ExportEnemies = ExportEnemies;
			window.ExportFlavour = ExportFlavour;
			window.ExportRegions = ExportRegions;
			window.ExportSentinels = ExportSentinels;
			window.ExportSyndicates = ExportSyndicates;
			window.ExportWarframes = ExportWarframes;
			window.ExportWeapons = ExportWeapons;
			window.profile = profile;
			//window.profile = { Results: [ { DisplayName: "asdasdasd", Created: { $date: { $numberLong: "1364064293561" } } } ] };

			for (let i = 0; i != syndicateTags.length; ++i)
			{
				if (syndicateTags[i] == "NIGHTWAVE")
				{
					syndicateTags[i] = ExportNightwave.affiliationTag;
				}
			}

			document.getElementById("profile-nav").classList.remove("d-none");
			activateTab(params.has("tab") ? params.get("tab") : "fashion"); // default tab

			renderProfile();
			onLanguageUpdate = function()
			{
				renderProfile();
			};
		});

		function isXplatName(name)
		{
			return name.charCodeAt(name.length - 1) >= 0xE000;
		}

		function xplatNameToPlatformId(name)
		{
			return name.charCodeAt(name.length - 1) - 0xE000;
		}

		function sanitiseName(name)
		{
			if (name.charCodeAt(name.length - 1) >= 0xE000)
			{
				name = name.substr(0, name.length - 1);
			}
			return name;
		}

		let lookup_in_progress = false;
		function doLookup()
		{
			if (!("profile" in window) || lookup_in_progress)
			{
				alert("Still loading, please wait.");
				return;
			}
			lookup_in_progress = true;
			document.querySelector("#status span").textContent = "Fetching data for " + document.getElementById("username").value;
			document.querySelector("#status").classList.remove("d-none");
			fetch("https://conduit.browse.wf/profilebyid?account=" + encodeURIComponent(document.getElementById("username").value) + "&platform=" + document.getElementById("platform").value).then(res => res.json()).then(data =>
			{
				if (data)
				{
					window.profile = data;
					window.hashprefix = "account=" + encodeURIComponent(sanitiseName(profile.Results[0].AccountId.$oid)) + "&platform=" + profile.platform + "&";
					location.hash = hashprefix + "tab=fashion"; // default tab
				}
				else
				{
					alert("Failed to load data for " + document.getElementById("username").value);
				}
				renderProfile();
				lookup_in_progress = false;
			}).catch(() => {
				alert("Bad request. Please note that you need to input an account id.");
				renderProfile();
				lookup_in_progress = false;
			});
		}

		function renderProfile()
		{
			document.querySelector("#status").classList.add("d-none");

			const sanitisedName = sanitiseName(profile.Results[0].DisplayName);
			document.getElementById("profile-name").textContent = sanitisedName;
			document.getElementById("profile-discriminator").textContent = "";
			if (isXplatName(profile.Results[0].DisplayName))
			{
				platform_suffix_pluto_promise.then(() => {
					pluto_invoke("get_discriminator", sanitisedName, xplatNameToPlatformId(profile.Results[0].DisplayName)).then(discriminator => {
						document.getElementById("profile-discriminator").textContent = "#" + discriminator.toString().padStart(3, "0");
					});
				});
			}

			const createdAt = parseInt(profile.Results[0].AccountId.$oid.substr(0, 8), 16);
			document.querySelector("#mr").classList.remove("d-none");
			document.querySelector("#mr b").textContent = (profile.Results[0].PlayerLevel ?? 0);
			document.querySelector("#mr span").textContent = new Date(createdAt * 1000).toLocaleDateString();

			const accolades = [];
			if (profile.Results[0].Staff)
			{
				accolades.push("Digital Extremes Staff");
			}
			else
			{
				if (profile.Results[0].Founder)
				{
					accolades.push("Founder (" + founderTiers[profile.Results[0].Founder] + ")");
				}
				if (profile.Results[0].Guide)
				{
					accolades.push(guideTiers[profile.Results[0].Guide]);
				}
				if (profile.Results[0].Moderator)
				{
					accolades.push("Moderator");
				}
				if (profile.Results[0].Partner)
				{
					accolades.push("Warframe Creator");
				}
				if (createdAt < 1363651200)
				{
					accolades.push("Closed Beta Player");
				}
				if (profile.Results[0].Accolades?.Heirloom)
				{
					accolades.push("Ten Year Supporter");
				}
			}
			if (accolades.length != 0)
			{
				document.querySelector("#accolades span").textContent = accolades.join(", ");
				document.querySelector("#accolades").classList.remove("d-none");
			}
			else
			{
				document.querySelector("#accolades").classList.add("d-none");
			}

			if (profile.Results[0].GuildName)
			{
				document.querySelector("#clan span").textContent = profile.Results[0].GuildName + ", " + clanTiers[profile.Results[0].GuildTier] + " Clan Rank " + profile.Results[0].GuildClass;
				document.querySelector("#clan").classList.remove("d-none");
			}
			else
			{
				document.querySelector("#clan").classList.add("d-none");
			}

			document.getElementById("syndicates").innerHTML = "";
			for (const tag of syndicateTags)
			{
				const syndicate = ExportSyndicates[tag];
				const affiliation = profile.Results[0].Affiliations?.find(x => x.Tag == tag);

				const col = document.createElement("div");
				col.className = "col-md-6 p-1";
				{
					const card = document.createElement("div");
					card.className = "card";
					{
						const row = document.createElement("div");
						row.className = "row g-0";
						{
							const logo = makeSyndicateLogoElement(syndicate);
							logo.className = "col-xxl-2 col-lg-3 col-md-4 col-3 rounded-start";
							logo.children[0].className = "img-fluid rounded-start";
							row.appendChild(logo);
						}
						{
							const body = document.createElement("div");
							body.className = "col-xxl-10 col-lg-9 col-md-8 col-9";
							body.style.padding = "14px 16px";
							{
								const title = document.createElement("h5");
								title.className = "card-title";
								title.textContent = dict[syndicate.name];
								body.appendChild(title);
							}
							const level = (affiliation?.Title ?? 0);
							const title = syndicate.titles?.find(x => x.level == level);
							{
								const subtitle = document.createElement("h6");
								subtitle.className = "card-subtitle mb-2 text-body-secondary";
								subtitle.textContent = "Rank " + level;
								if (title)
								{
									subtitle.textContent += " · " + toTitleCase(dict[title.name]);
								}
								body.appendChild(subtitle);
							}
							{
								const standing = affiliation?.Standing ?? 0;
								const minStanding = (level < 0 ? title?.maxStanding : title?.minStanding) ?? 0;
								const text = document.createElement("p");
								text.className = "card-text";
								text.textContent = "Standing: " + (standing - minStanding).toLocaleString();
								if (minStanding != 0)
								{
									text.textContent += " (" + standing.toLocaleString() + " in total)";
								}
								body.appendChild(text);
							}
							row.appendChild(body);
						}
						card.appendChild(row);
					}
					col.appendChild(card);
				}
				document.getElementById("syndicates").appendChild(col);
			}

			document.getElementById("achievements").innerHTML = "";
			Object.entries(ExportAchievements)
			.sort((a, b) => (a[1].hidden ? 1 : 0) - (b[1].hidden ? 1 : 0))
			.forEach(([tag, achievement]) =>
			{
				if (achievement.icon || achievement.hidden)
				{
					const col = document.createElement("div");
					col.className = "col-md-6 p-1";
					{
						const card = document.createElement("div");
						card.className = "card";
						{
							const row = document.createElement("div");
							row.className = "row g-0";
							if (achievement.icon)
							{
								const div = document.createElement("div");
								div.className = "col-xxl-2 col-lg-3 col-md-4 col-3 rounded-start";
								{
									const img = document.createElement("img");
									img.className = "img-fluid rounded-start";
									img.src = "https://browse.wf" + achievement.icon;
									div.appendChild(img);
								}
								row.appendChild(div);
							}
							{
								const body = document.createElement("div");
								if (achievement.icon)
								{
									body.className = "col-xxl-10 col-lg-9 col-md-8 col-9";
								}
								body.style.padding = "9px";
								{
									const title = document.createElement("h5");
									title.className = "card-title";
									title.textContent = dict[achievement.name] ?? tag;
									if (tag.substr(0, 14) == "OrbVallisRacer")
									{
										title.textContent += " (" + vallisRaceNames[tag.substr(14)] + ")";
									}
									body.appendChild(title);
								}
								if (achievement.description)
								{
									const text = document.createElement("p");
									text.className = "card-text";
									text.textContent = dict[achievement.description];
									body.appendChild(text);
								}
								const progress = (profile.Results[0].ChallengeProgress?.find(x => x.Name == tag)?.Progress ?? 0);
								const requiredCount = (achievement.requiredCount ?? 1);
								body.innerHTML += `<div class="progress" role="progressbar"><div class="progress-bar" style="width: ${(progress / requiredCount) * 100}%">${progress.toLocaleString()}/${requiredCount.toLocaleString()}</div></div>`;
								row.appendChild(body);
							}
							card.appendChild(row);
						}
						col.appendChild(card);
					}
					document.getElementById("achievements").appendChild(col);
				}
			});

			profile.Results[0].Missions ??= [];
			document.querySelector("#missions tbody").innerHTML = "";
			Object.keys(ExportRegions).forEach(tag =>
			{
				if (tag != "EventNode763"
					&& !profile.Results[0].Missions.find(x => x.Tag == tag)
					)
				{
					profile.Results[0].Missions.push({ Tag: tag, Completes: 0 });
				}
			});
			profile.Results[0].Missions
			.sort((a, b) => b.Completes - a.Completes)
			.forEach(mission =>
			{
				const node = ExportRegions[mission.Tag];

				if (node)
				{
					if (node.nodeType == 3 /* NT_HUB */ && mission.Completes == 0)
					{
						return;
					}
					if (node.nodeType == 6 /* NT_SHORTCUT */)
					{
						return;
					}
				}

				const tr = document.createElement("tr");
				{
					const td = document.createElement("td");
					if (node)
					{
						td.textContent = dict[node.name];
						if (node.systemName && node.systemIndex != 19)
						{
							td.textContent += ", " + (dict[node.systemName] ?? node.systemName);
							if (node.missionIndex != 10)
							{
								td.textContent += " (" + toTitleCase(dict[node.missionName])
								if (node.factionName && node.systemIndex != 21)
								{
									td.textContent += " - " + toTitleCase(dict[node.factionName]);
								}
								td.textContent += ")";
							}
						}
					}
					else
					{
						td.textContent = mission.Tag;
					}
					tr.appendChild(td);
				}
				{
					const td = document.createElement("td");
					td.textContent = mission.Completes;
					tr.appendChild(td);
				}
				{
					const td = document.createElement("td");
					td.textContent = (mission.Tier ? "✓" : "");
					tr.appendChild(td);
				}
				{
					const td = document.createElement("td");
					if (node && node.masteryExp)
					{
						if (mission.Completes == 0)
						{
							td.textContent = "Missing out on " + (node.masteryExp * 2) + " mastery exp ";
						}
						else if (!mission.Tier)
						{
							td.textContent = "Missing out on " + node.masteryExp + " mastery exp.";
						}
					}
					tr.appendChild(td);
				}
				document.querySelector("#missions tbody").appendChild(tr);
			});

			profile.Results[0].LoadOutPreset ??= {};
			profile.Results[0].LoadOutInventory ??= {};

			/*if (profile.Results[0].LoadOutPreset.n)
			{
				document.querySelector("#loadout-name span").textContent = profile.Results[0].LoadOutPreset.n;
				document.getElementById("loadout-name").classList.remove("d-none");
			}
			else
			{
				document.getElementById("loadout-name").classList.add("d-none");
			}*/

			for (const category of ["Suits", "LongGuns", "Pistols", "Melee"])
			{
				document.getElementById(category + "-config").innerHTML = `<option value="0">Config A</option><option value="1">Config B</option><option value="2">Config C</option><option value="3">Config D</option><option value="4">Config E</option><option value="5">Config F</option>`;

				const key = category.substr(0, 1).toLowerCase();
				if (profile.Results[0].LoadOutPreset[key] && "cus" in profile.Results[0].LoadOutPreset[key])
				{
					document.querySelector("#" + category + "-config [value='" + profile.Results[0].LoadOutPreset[key].cus + "']").textContent += " (Active)";
					document.getElementById(category + "-config").value = profile.Results[0].LoadOutPreset[key].cus;
				}

				if (category != "Suits")
				{
					if (profile.Results[0].LoadOutPreset[key]?.ItemId)
					{
						document.getElementById(category + "-div").classList.remove("d-none");
					}
					else
					{
						document.getElementById(category + "-div").classList.add("d-none");
					}

					if (profile.Results[0].LoadOutPreset[key]?.hide)
					{
						document.getElementById(category + "-hide").classList.remove("d-none");
					}
					else
					{
						document.getElementById(category + "-hide").classList.add("d-none");
					}
				}
			}
			updateFashion();

			/*if (profile.Results[0].OperatorLoadOuts)
			{
				for (let i = 0; i != 17; ++i)
				{
					displaySkin("Operator", i, profile.Results[0].OperatorLoadOuts[0].Skins[i]);
				}
			}
			else
			{
				for (let i = 0; i != 17; ++i)
				{
					displaySkin("Operator", i, "");
				}
			}*/

			for (const stat of ["TimePlayedSec", "Income", "MissionsCompleted", "MissionsFailed", "MissionsQuit", "MissionsInterrupted", "MissionsDumped", "CiphersSolved", "CiphersFailed", "CipherTime", "ReviveCount", "HealCount", "Deaths"/*, "MeleeKills"*/])
			{
				const value = (profile.Stats && profile.Stats[stat]) ? profile.Stats[stat] : 0;
				if (stat == "TimePlayedSec" || stat == "CipherTime")
				{
					document.getElementById("stat-" + stat).textContent = (value / 3600).toFixed(1) + " hours";
				}
				else
				{
					document.getElementById("stat-" + stat).textContent = value.toLocaleString();
				}
			}
			if (profile.Stats && profile.Stats.CipherTime && profile.Stats.CiphersSolved)
			{
				document.getElementById("stat-CipherTimeAvg").textContent = (profile.Stats.CipherTime / profile.Stats.CiphersSolved).toFixed(1) + "s";
			}
			else
			{
				document.getElementById("stat-CipherTimeAvg").textContent = "0s";
			}

			document.getElementById("equipment-stats").innerHTML = "";
			if (profile.Stats && profile.Stats.Weapons)
			{
				profile.Stats.Weapons
				.sort((a, b) => b.equipTime - a.equipTime)
				.forEach(item =>
				{
					const type = ExportWarframes[item.type] ?? ExportWeapons[item.type] ?? ExportSentinels[item.type];
					if (!type)
					{
						return;
					}
					const tr = document.createElement("tr");
					{
						const td = document.createElement("td");
						td.innerHTML = dict[type.name];
						tr.appendChild(td);
					}
					{
						const td = document.createElement("td");
						td.innerHTML = ((item.equipTime ?? 0) / 3600).toFixed(1);
						tr.appendChild(td);
					}
					{
						const td = document.createElement("td");
						td.innerHTML = (item.kills ?? 0).toLocaleString();
						tr.appendChild(td);
					}
					{
						const td = document.createElement("td");
						td.innerHTML = (item.headshots ?? 0).toLocaleString();
						tr.appendChild(td);
					}
					{
						const td = document.createElement("td");
						td.innerHTML = (item.assists ?? 0).toLocaleString();
						tr.appendChild(td);
					}
					{
						const td = document.createElement("td");
						td.innerHTML = (item.xp ?? 0).toLocaleString();
						tr.appendChild(td);
					}
					document.getElementById("equipment-stats").appendChild(tr);
				});
			}

			document.getElementById("enemy-stats").innerHTML = "";
			if (profile.Stats && profile.Stats.Enemies)
			{
				profile.Stats.Enemies
				.sort((a, b) => b.kills - a.kills)
				.forEach(enemy =>
				{
					const type = ExportEnemies.avatars[enemy.type];
					if (!type)
					{
						return;
					}
					const tr = document.createElement("tr");
					{
						const td = document.createElement("td");
						td.innerHTML = dict[type.name];
						tr.appendChild(td);
					}
					{
						const td = document.createElement("td");
						td.innerHTML = (enemy.kills ?? 0).toLocaleString();
						tr.appendChild(td);
					}
					{
						const td = document.createElement("td");
						td.innerHTML = (enemy.headshots ?? 0).toLocaleString();
						tr.appendChild(td);
					}
					{
						const td = document.createElement("td");
						td.innerHTML = (enemy.assists ?? 0).toLocaleString();
						tr.appendChild(td);
					}
					{
						const td = document.createElement("td");
						td.innerHTML = (enemy.executions ?? 0).toLocaleString();
						tr.appendChild(td);
					}
					{
						const td = document.createElement("td");
						td.innerHTML = (enemy.deaths ?? 0).toLocaleString();
						tr.appendChild(td);
					}
					{
						const td = document.createElement("td");
						const entry = profile.Stats.Scans?.find(x => x.type == enemy.type);
						td.innerHTML = (entry?.scans ?? 0).toLocaleString();
						tr.appendChild(td);
					}
					document.getElementById("enemy-stats").appendChild(tr);
				});
			}
		}

		function displaySkin(category, i, value)
		{
			const elm = document.getElementById(category + "-skin-" + i);
			if (elm)
			{
				if (value && value != "" && value != "/Lotus/Upgrades/Skins/Armor/WarframeDefaults/EmptyCustomization")
				{
					if (ExportCustoms[value])
					{
						const a = document.createElement("a");
						/*if (ExportCustoms[value].name == "" || dict[ExportCustoms[value].name] == "")
						{
							a.textContent = value;
						}
						else*/
						{
							a.textContent = dict[ExportCustoms[value].name] ?? ExportCustoms[value].name ?? value;
						}
						a.href = "https://browse.wf" + ExportCustoms[value].icon;
						a.target = "_blank";
						elm.querySelector("span").innerHTML = "";
						elm.querySelector("span").appendChild(a);
					}
					else
					{
						elm.querySelector("span").textContent = value;
					}
					elm.classList.remove("d-none");
				}
				else
				{
					elm.classList.add("d-none");
				}
			}
		}

		const modularWeapons = {
			"/Lotus/Weapons/SolarisUnited/Primary/LotusModularPrimary": "Kitgun",
			"/Lotus/Weapons/SolarisUnited/Primary/LotusModularPrimaryBeam": "Kitgun",
			"/Lotus/Weapons/SolarisUnited/Primary/LotusModularPrimaryLauncher": "Kitgun",
			"/Lotus/Weapons/SolarisUnited/Primary/LotusModularPrimaryShotgun": "Kitgun",
			"/Lotus/Weapons/SolarisUnited/Primary/LotusModularPrimarySniper": "Kitgun",
			"/Lotus/Weapons/SolarisUnited/Secondary/LotusModularSecondary": "Kitgun",
			"/Lotus/Weapons/SolarisUnited/Secondary/LotusModularSecondaryBeam": "Kitgun",
			"/Lotus/Weapons/SolarisUnited/Secondary/LotusModularSecondaryShotgun": "Kitgun",
			"/Lotus/Weapons/Ostron/Melee/LotusModularWeapon": "Zaw",
		};

		function updateFashion()
		{
			for (const category of ["Suits", "LongGuns", "Pistols", "Melee"])
			{
				const equipment = profile.Results[0].LoadOutInventory[category] ? profile.Results[0].LoadOutInventory[category][0] : { ItemType: "None", Configs: [] };
				const config = equipment.Configs[document.getElementById(category + "-config").value];

				document.getElementById(category + "-name").textContent = (dict[ExportWarframes[equipment.ItemType]?.name] ?? dict[ExportWeapons[equipment.ItemType]?.name] ?? modularWeapons[equipment.ItemType] ?? equipment.ItemType);
				if (equipment.ItemName && equipment.ItemName != document.getElementById(category + "-name").textContent)
				{
					if (equipment.ItemName.indexOf("|") === -1) // e.g. for a stock Tenet Arca Plasmor, the ItemName would be "/Lotus/Language/Weapons/CrpBEArcaPlasmorName|PARVI LISSIDPHA" with the respective Lich/Sister name.
					{
						document.getElementById(category + "-name").textContent += " (\"" + equipment.ItemName + "\")";
					}
				}

				if (config?.Skins)
				{
					for (let i = 0; i != 26; ++i)
					{
						displaySkin(category, i, config?.Skins[i]);
					}
				}
				else
				{
					for (let i = 0; i != 26; ++i)
					{
						displaySkin(category, i, "");
					}
				}
			
				for (const section of ["pricol", "attcol", "syancol", "sigcol"])
				{
					for (const key of ["t0", "t1", "t2", "t3", "m0", "m1", "en", "e1"])
					{
						const elm = document.getElementById(category + "-" + section + "-" + key);
						if (elm)
						{
							elm.querySelector(".palettes").textContent = "";
							if (config && config[section] && config[section][key])
							{
								const [r, g, b/*, a*/] = parseRgbaInt(config[section][key]);
								// Alpha might be interesting for sigils
								const hex = toHexString(r, g, b);
								elm.querySelector(".hex").textContent = hex;
								elm.querySelector(".hex").style.fontFamily = "monospace";
								elm.querySelector(".colour-blob").style.backgroundColor = hex;
								Object.values(ExportFlavour).forEach(flavour =>
								{
									if (flavour.hexColours)
									{
										for (const colour of flavour.hexColours)
										{
											const [r2, g2, b2] = peColourToRgb(colour);
											if (r == r2 && g == g2 && b == b2)
											{
												elm.querySelector(".palettes").textContent += " · " + dict[flavour.name];
												break;
											}
										}
									}
									if (flavour.legacyColours)
									{
										for (const colour of flavour.legacyColours)
										{
											const [r2, g2, b2] = peColourToRgb(colour);
											if (r == r2 && g == g2 && b == b2)
											{
												elm.querySelector(".palettes").textContent += " · " + dict[flavour.name] + " (Legacy)";
												break;
											}
										}
									}
								});
							}
							else
							{
								elm.querySelector(".hex").textContent = "Default";
								elm.querySelector(".hex").style.fontFamily = "";
								elm.querySelector(".colour-blob").style.backgroundColor = "";
							}
						}
					}
				}
			}
		}

		function tabulate(elm, event)
		{
			event.preventDefault();

			activateTab(elm.getAttribute("data-tab"));

			if ("profile" in window)
			{
				location.hash = hashprefix + "tab=" + elm.getAttribute("data-tab");
			}
		}

		function activateTab(id)
		{
			document.querySelectorAll("[data-tab]").forEach(x => x.classList.remove("active"));
			document.querySelector("[data-tab="+id+"]").classList.add("active");

			document.querySelectorAll(".tab").forEach(x => x.classList.add("d-none"));
			document.getElementById(id).classList.remove("d-none");
		}
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
