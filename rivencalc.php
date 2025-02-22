<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
	<title>Riven Calculator | browse.wf</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="icon" href="https://browse.wf/Lotus/Interface/Icons/Categories/GrimoireModIcon.png">
</head>
<body data-bs-theme="dark">
	<?php require "components/navbar.php"; ?>
	<div class="container p-3">
		<p>Every stat (buff and curse) on your Riven has a random multiplier between 0.9x and 1.1x (or -10% to +10%). This tool helps you see the impact on the final numbers.</p>
		<div class="row g-3 mb-4">
			<div class="col-md-6">
				<div class="card">
					<h5 class="card-header">Weapon</h5>
					<div class="card-body">
						<input class="form-control" placeholder="Enter name..." id="weapon-name" list="weapons-datalist" />
						<hr>
						<div style="position: relative; width: 0; height: 0">
							<span style="position: absolute; top: -30px; left: 10px">or</span>
						</div>
						<div class="row">
							<div class="col-6">
								<select class="form-control" id="riven-type">
									<option value="LotusArchgunRandomModRare">Archgun</option>
									<option value="LotusModularPistolRandomModRare">Kitgun</option>
									<option value="PlayerMeleeWeaponRandomModRare">Melee</option>
									<option value="LotusPistolRandomModRare">Pistol</option>
									<option value="LotusRifleRandomModRare" selected>Rifle</option>
									<option value="LotusShotgunRandomModRare">Shotgun</option>
									<option value="LotusModularMeleeRandomModRare">Zaw</option>
								</select>
							</div>
							<div class="col-6">
								<select class="form-control" id="omega-attenuation" style="font-family: monospace">
									<option value="0.5">●○○○○ (0.5x)</option>
									<option value="0.55">●○○○○ (0.55x)</option>
									<option value="0.6">●○○○○ (0.6x)</option>
									<option value="0.65">●○○○○ (0.65x)</option>
									<option value="0.7">●●○○○ (0.7x)</option>
									<option value="0.75">●●○○○ (0.75x)</option>
									<option value="0.77">●●○○○ (0.77x)</option>
									<option value="0.8">●●○○○ (0.8x)</option>
									<option value="0.85">●●○○○ (0.85x)</option>
									<option value="0.9">●●●○○ (0.9x)</option>
									<option value="0.95">●●●○○ (0.95x)</option>
									<option value="0.965">●●●○○ (0.965x)</option>
									<option value="1" selected>●●●○○ (1x)</option>
									<option value="1.05">●●●○○ (1.05x)</option>
									<option value="1.1">●●●○○ (1.1x)</option>
									<option value="1.14">●●●●○ (1.14x)</option>
									<option value="1.15">●●●●○ (1.15x)</option>
									<option value="1.2">●●●●○ (1.2x)</option>
									<option value="1.21">●●●●○ (1.21x)</option>
									<option value="1.245">●●●●○ (1.245x)</option>
									<option value="1.25">●●●●○ (1.25x)</option>
									<option value="1.28">●●●●○ (1.28x)</option>
									<option value="1.29">●●●●○ (1.29x)</option>
									<option value="1.3">●●●●○ (1.3x)</option>
									<option value="1.31">●●●●● (1.31x)</option>
									<option value="1.315">●●●●● (1.315x)</option>
									<option value="1.33">●●●●● (1.33x)</option>
									<option value="1.34">●●●●● (1.34x)</option>
									<option value="1.35">●●●●● (1.35x)</option>
									<option value="1.36">●●●●● (1.36x)</option>
									<option value="1.38">●●●●● (1.38x)</option>
									<option value="1.39">●●●●● (1.39x)</option>
									<option value="1.4">●●●●● (1.4x)</option>
									<option value="1.41">●●●●● (1.41x)</option>
									<option value="1.42">●●●●● (1.42x)</option>
									<option value="1.43">●●●●● (1.43x)</option>
									<option value="1.44">●●●●● (1.44x)</option>
									<option value="1.45">●●●●● (1.45x)</option>
									<option value="1.455">●●●●● (1.455x)</option>
									<option value="1.46">●●●●● (1.46x)</option>
									<option value="1.47">●●●●● (1.47x)</option>
									<option value="1.48">●●●●● (1.48x)</option>
									<option value="1.49">●●●●● (1.49x)</option>
									<option value="1.5">●●●●● (1.5x)</option>
									<option value="1.51">●●●●● (1.51x)</option>
									<option value="1.52">●●●●● (1.52x)</option>
									<option value="1.53">●●●●● (1.53x)</option>
									<option value="1.55">●●●●● (1.55x)</option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<h5 class="card-header">Stats</h5>
					<div class="card-body">
						<div class="row">
							<div class="col-4">
								<label for="lvl" class="form-label">Level</label>
								<input id="lvl" type="number" class="form-control" min="0" max="8" value="8" />
							</div>
							<div class="col-4">
								<label for="buffs" class="form-label">Buffs</label>
								<input id="buffs" type="number" class="form-control" min="1" value="3" />
							</div>
							<div class="col-4">
								<label for="curses" class="form-label">Curses</label>
								<input id="curses" type="number" class="form-control" min="0" value="1" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row g-3">
			<div class="col-md-6">
				<div class="card">
					<h5 class="card-header">Buffs</h5>
					<div class="card-body" id="buffs-body">Loading...</div>
				</div>
			</div>
			<div class="col-md-6" id="hide-if-no-curses">
				<div class="card">
					<h5 class="card-header">Curses</h5>
					<div class="card-body" id="curses-body">Loading...</div>
				</div>
			</div>
		</div>
	</div>
	<datalist id="weapons-datalist"></datalist>
	<?php require "components/commonjs.html"; ?>
	<script src="https://calamity-inc.github.io/warframe-riven-info/RivenParser.js"></script>
	<script>
		let weaponConfig = "LotusRifleRandomModRare:1";
		Promise.all([
			getDictPromise(),
			fetch("https://browse.wf/warframe-public-export-plus/ExportWeapons.json").then(res => res.json()),
			fetch("https://browse.wf/warframe-public-export-plus/ExportUpgrades.json").then(res => res.json()),
			fetch("https://browse.wf/warframe-public-export-plus/ExportTextIcons.json").then(res => res.json())
		]).then(([ dict, ExportWeapons, ExportUpgrades, ExportTextIcons ]) => {
			window.dict = dict;
			window.ExportWeapons = ExportWeapons;
			window.ExportUpgrades = ExportUpgrades;
			window.ExportTextIcons = ExportTextIcons;

			updateDatalist();

			const params = new URLSearchParams(location.hash.replace("#", ""));
			if (params.has("weapon"))
			{
				weaponConfig = params.get("weapon");
				if (weaponConfig.indexOf(":") == -1)
				{
					document.getElementById("weapon-name").value = weaponConfig;
					weaponConfig = getValue(document.getElementById("weapon-name"));
					if (!weaponConfig)
					{
						weaponConfig = "LotusRifleRandomModRare:1";
						document.getElementById("weapon-name").value = "";
					}
				}
				const [rivenType, omegaAttenuation] = weaponConfig.split(":");
				document.getElementById("riven-type").value = rivenType;
				document.getElementById("omega-attenuation").value = omegaAttenuation;
			}
			if (params.has("lvl"))
			{
				document.getElementById("lvl").value = params.get("lvl");
			}
			if (params.has("buffs"))
			{
				document.getElementById("buffs").value = params.get("buffs");
			}
			if (params.has("curses"))
			{
				document.getElementById("curses").value = params.get("curses");
			}

			document.getElementById("weapon-name").onchange = function()
			{
				const value = getValue(this);
				if (value)
				{
					weaponConfig = this.value;

					const [rivenType, omegaAttenuation] = value.split(":");
					document.getElementById("riven-type").value = rivenType;
					document.getElementById("omega-attenuation").value = omegaAttenuation;
					calculateStats();

					saveSettings();
				}
			};

			document.getElementById("riven-type").onchange = function()
			{
				weaponConfig = document.getElementById("riven-type").value + ":" + document.getElementById("omega-attenuation").value;
				calculateStats();
				saveSettings();
			};

			document.getElementById("omega-attenuation").onchange = function()
			{
				weaponConfig = document.getElementById("riven-type").value + ":" + document.getElementById("omega-attenuation").value;
				calculateStats();
				saveSettings();
			};

			document.getElementById("lvl").onchange = function()
			{
				calculateStats();
				saveSettings();
			};

			document.getElementById("buffs").onchange = function()
			{
				calculateStats();
				saveSettings();
			};

			document.getElementById("curses").onchange = function()
			{
				calculateStats();
				saveSettings();
			};

			calculateStats();

			onLanguageUpdate = function()
			{
				updateDatalist();
				calculateStats();
			};
		});

		function updateDatalist()
		{
			document.getElementById("weapons-datalist").innerHTML = "";
			Object.values(ExportWeapons).forEach(weapon => {
				if ("primeOmegaAttenuation" in weapon) // kitgun chamber
				{
					let option = document.createElement("option");
					option.setAttribute("data-value", "LotusModularPistolRandomModRare:" + weapon.primeOmegaAttenuation);
					option.value = (dict[weapon.name] ?? weapon.name) + " (Primary)";
					document.getElementById("weapons-datalist").appendChild(option);

					option = document.createElement("option");
					option.setAttribute("data-value", "LotusModularPistolRandomModRare:" + weapon.omegaAttenuation);
					option.value = (dict[weapon.name] ?? weapon.name) + " (Secondary)";
					document.getElementById("weapons-datalist").appendChild(option);
				}
				else if (weapon.totalDamage != 0) // normal weapon
				{
					let rivenType = "LotusRifleRandomModRare";
					if (weapon.productCategory == "Pistols")
					{
						rivenType = "LotusPistolRandomModRare";
					}
					else if (weapon.productCategory == "Melee"
						|| weapon.holsterCategory == "MELEE" // to handle melees in the "SentinelWeapons" product category
						)
					{
						rivenType = "PlayerMeleeWeaponRandomModRare";
					}
					else if (weapon.holsterCategory == "SHOTGUN")
					{
						rivenType = "LotusShotgunRandomModRare";
					}

					let option = document.createElement("option");
					option.setAttribute("data-value", rivenType + ":" + weapon.omegaAttenuation);
					option.value = dict[weapon.name] ?? weapon.name;
					document.getElementById("weapons-datalist").appendChild(option);
				}
				else if (weapon.omegaAttenuation != 1.0 && !weapon.excludeFromCodex) // zaw strike, and not their pvp variants
				{
					let option = document.createElement("option");
					option.setAttribute("data-value", "LotusModularMeleeRandomModRare:" + weapon.omegaAttenuation);
					option.value = dict[weapon.name] ?? weapon.name;
					document.getElementById("weapons-datalist").appendChild(option);
				}
			});
		}

		function getValue(input)
		{
			return document.getElementById(input.getAttribute("list")).querySelector("[value='" + input.value.split("'").join("\\'") + "']")?.getAttribute("data-value");
		}

		function calculateStats()
		{
			const rivenType = document.getElementById("riven-type").value;
			const omegaAttenuation = document.getElementById("omega-attenuation").value;
			const lvl = parseInt(document.getElementById("lvl").value);
			const buffs = parseInt(document.getElementById("buffs").value);
			const curses = parseInt(document.getElementById("curses").value);
			const mod_data = ExportUpgrades["/Lotus/Upgrades/Mods/Randomized/" + rivenType];
			const weaponData = Object.values(ExportWeapons).find(weapon => (dict[weapon.name] ?? weapon.name) == weaponConfig);
			document.getElementById("buffs-body").innerHTML = "";
			document.getElementById("curses-body").innerHTML = "";
			mod_data.upgradeEntries.forEach(upgrade => {
				if (upgrade.prefixTag != "") // Can be buff?
				{
					let min = getBuffValue(rivenType, upgrade.tag, 0, omegaAttenuation, lvl, buffs, curses);
					let max = getBuffValue(rivenType, upgrade.tag, 1, omegaAttenuation, lvl, buffs, curses);
					let div = document.createElement("div");
					{
						let span = document.createElement("span");
						span.innerHTML = resolveTextIcons(dict[upgrade.upgradeValues[0].locTag]).split("|STAT1|").join("|val|").split("|val|").join("<b>" + min.displayValue + "</b> to <b>" + max.displayValue + "</b>") + " ";
						div.appendChild(span);
					}
					addStatCompatInfo(div, weaponData, upgrade.tag, true);
					{
						let a = document.createElement("a");
						a.style.textDecoration = "none";
						a.href = "#";
						a.onclick = function(event)
						{
							event.preventDefault();
							let displayValue = prompt("Input the number your Riven has for this stat (e.g. 42.5):");
							if (displayValue)
							{
								const f = RivenParser.unparseBuff(rivenType, omegaAttenuation, lvl, buffs, curses, upgrade.tag, RivenParser.displayValueToValue(upgrade.tag, displayValue));
								this.textContent = "▲ " + displayValue + " ≈ " + RivenParser.lerp(0.9, 1.1, f).toFixed(2) + "x = " + RivenParser.floatToGrade(f);
							}
						};
						a.textContent = "▲";
						a.title = "Grading";
						div.appendChild(a);
					}
					document.getElementById("buffs-body").appendChild(div);
				}
				if (upgrade.tag != "WeaponMeleeComboBonusOnHitMod") // Can be curse?
				{
					let min = getCurseValue(rivenType, upgrade.tag, 0, omegaAttenuation, lvl, buffs, curses);
					let max = getCurseValue(rivenType, upgrade.tag, 1, omegaAttenuation, lvl, buffs, curses);
					if (upgrade.upgradeValues[0].reverseValueSymbol)
					{
						min.displayValue *= -1;
						max.displayValue *= -1;
					}
					let div = document.createElement("div");
					{
						let span = document.createElement("span");
						span.innerHTML = resolveTextIcons(dict[upgrade.upgradeValues[0].locTag]).split("|STAT1|").join("|val|").split("|val|").join("<b>" + min.displayValue + "</b> to <b>" + max.displayValue + "</b>") + " ";
						div.appendChild(span);
					}
					addStatCompatInfo(div, weaponData, upgrade.tag, false);
					{
						let a = document.createElement("a");
						a.style.textDecoration = "none";
						a.href = "#";
						a.onclick = function(event)
						{
							event.preventDefault();
							let displayValue = prompt("Input the number your Riven has for this stat (e.g. -42.5):");
							if (displayValue)
							{
								if (upgrade.upgradeValues[0].reverseValueSymbol)
								{
									displayValue *= -1;
								}
								const f = RivenParser.unparseCurse(rivenType, omegaAttenuation, lvl, buffs, curses, upgrade.tag, RivenParser.displayValueToValue(upgrade.tag, displayValue));
								this.textContent = "▲ " + displayValue + " ≈ " + RivenParser.lerp(0.9, 1.1, f).toFixed(2) + "x = " + RivenParser.floatToGrade(1 - f);
							}
						};
						a.textContent = "▲";
						a.title = "Grading";
						div.appendChild(a);
					}
					document.getElementById("curses-body").appendChild(div);
				}
			});
			if (curses == 0)
			{
				document.getElementById("hide-if-no-curses").classList.add("d-none");
			}
			else
			{
				document.getElementById("hide-if-no-curses").classList.remove("d-none");
			}
		}

		const upgradeTagToDamageType = {
			"WeaponImpactDamageMod": "DT_IMPACT",
			"WeaponArmorPiercingDamageMod": "DT_PUNCTURE",
			"WeaponSlashDamageMod": "DT_SLASH",
			"WeaponElectricityDamageMod": "DT_ELECTRICITY",
			"WeaponFireDamageMod": "DT_FIRE",
			"WeaponFreezeDamageMod": "DT_FREEZE",
			"WeaponToxinDamageMod": "DT_POISON",
		}

		function addStatCompatInfo(div, weaponData, tag, buff)
		{
			if (weaponData)
			{
				let incompatible = false;
				if (tag == "WeaponProjectileSpeedMod"
					&& weaponData.compatibilityTags
					&& !weaponData.compatibilityTags.find(x => x == "PROJECTILE")
					)
				{
					incompatible = true;
				}
				if (tag in upgradeTagToDamageType)
				{
					const damageType = upgradeTagToDamageType[tag];
					if (!weaponCanRollDamageType(weaponData, damageType))
					{
						const isPhysical = (damageType == "DT_IMPACT" || damageType == "DT_PUNCTURE" || damageType == "DT_SLASH");
						if (isPhysical || !buff)
						{
							incompatible = true;
						}
					}
				}
				if (incompatible)
				{
					let span = document.createElement("span");
					span.textContent = "ⓘ";
					span.className = "text-body-emphasis";
					span.title = "This stat can currently not be rolled on the selected weapon.";
					div.appendChild(span);

					span = document.createElement("span");
					span.textContent = " ";
					div.appendChild(span);
				}
			}
		}

		// Test vectors for rollable physicals

		// Weapons with projectile:
		// - Aeolak: Impact, Puncture, Slash.
		// - Afentis: Puncture.
		// - Acceltra: Impact.
		// - Hystrix: Puncture.
		// Weapons without projectile:
		// - Braton: Impact, Puncture, Slash.
		// - Bronco: Impact.
		// - Lex: Puncture.

		function weaponCanRollDamageType(weaponData, damageType)
		{
			if (!weaponData.behaviors)
			{
				return true;
			}
			const behavior = weaponData.behaviors[0];
			const damageTable = behavior.projectile?.attack ? behavior.projectile.attack : behavior.impact;
			if (damageType in damageTable)
			{
				const totalDamage = Object.values(damageTable).reduce((a, b) => a + b, 0);
				return (damageTable[damageType] / totalDamage) > 0.2;
			}
			return false;
		}

		function getBuffValue(rivenType, tag, tagValue, omegaAttenuation, lvl, buffs, curses)
		{
			tagValue = RivenParser.floatToRivenInt(tagValue);
			const fingerprint = { lvl, buffs: [], curses: [] };
			do {
				fingerprint.buffs.push({ Tag: tag, Value: tagValue });
			} while (--buffs > 0);
			while (curses-- > 0)
			{
				fingerprint.curses.push({ Tag: "WeaponCritChanceMod", Value: 0 });
			}
			return RivenParser.parseRiven(rivenType, fingerprint, omegaAttenuation).stats[0];
		}

		function getCurseValue(rivenType, tag, tagValue, omegaAttenuation, lvl, buffs, curses)
		{
			tagValue = RivenParser.floatToRivenInt(tagValue);
			const fingerprint = { lvl, buffs: [], curses: [] };
			while (buffs-- > 0)
			{
				fingerprint.buffs.push({ Tag: "WeaponCritChanceMod", Value: 0 });
			}
			do {
				fingerprint.curses.push({ Tag: tag, Value: tagValue });
			} while (--curses > 0);
			return RivenParser.parseRiven(rivenType, fingerprint, omegaAttenuation).stats[fingerprint.buffs.length];
		}

		function saveSettings()
		{
			location.hash = "weapon=" + encodeURIComponent(weaponConfig) + "&lvl=" + document.getElementById("lvl").value + "&buffs=" + document.getElementById("buffs").value + "&curses=" + document.getElementById("curses").value;
		}
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
