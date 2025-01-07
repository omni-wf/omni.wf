<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
	<title>Live World State | browse.wf</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="icon" href="https://browse.wf/Lotus/Interface/Icons/Categories/GrimoireModIcon.png">
</head>
<body data-bs-theme="dark">
	<?php require "components/navbar.php"; ?>
	<div class="container-fluid pt-3">
		<div class="row">
			<div class="col-xl-4 col-md-6">
				<div class="card mb-3">
					<h4 class="card-header">Environments</h4>
					<div class="card-body">
						<table class="table table-hover table-borderless mb-0">
							<tr>
								<th id="poe-name" class="w-50">Plains of Eidolon</th>
								<td id="poe" class="w-50">Fetching data...</td>
							</tr>
							<tr>
								<th id="vallis-name" class="w-50">Orb Vallis</th>
								<td id="vallis" class="w-50"></td>
							</tr>
							<tr>
								<th id="deimos-name" class="w-50">Cambion Drift</th>
								<td id="deimos" class="w-50">Fetching data...</td>
							</tr>
							<tr>
								<th id="zariman-name" class="w-50">Zariman</th>
								<td id="zariman" class="w-50">Fetching data...</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<div class="col-xl-8">
				<div class="card mb-3">
					<h4 class="card-header" id="HexSyndicate-header">Hex Bounties</h4>
					<div class="card-body">
						<table class="table table-hover table-borderless mb-0" id="HexSyndicate-table">
							<tr>
								<th class="mission">Fetching data...</th>
								<td class="challenge"></td>
								<td class="ally"></td>
								<td>65-70</td>
								<td>1000/1500</td>
							</tr>
							<tr>
								<th class="mission"></th>
								<td class="challenge"></td>
								<td class="ally"></td>
								<td>75-80</td>
								<td>2000/3000</td>
							</tr>
							<tr>
								<th class="mission"></th>
								<td class="challenge"></td>
								<td class="ally"></td>
								<td>85-90</td>
								<td>3000/4500</td>
							</tr>
							<tr>
								<th class="mission"></th>
								<td class="challenge"></td>
								<td class="ally"></td>
								<td>95-100</td>
								<td>4000/6000</td>
							</tr>
							<tr>
								<th class="mission"></th>
								<td class="challenge"></td>
								<td class="ally"></td>
								<td>105-110</td>
								<td>5000/7500</td>
							</tr>
							<tr>
								<th class="mission"></th>
								<td class="challenge"></td>
								<td class="ally"></td>
								<td>115-120</td>
								<td>6000/9000</td>
							</tr>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-12 col-lg-6">
						<div class="card mb-3">
							<h4 class="card-header" id="EntratiLabSyndicate-header">Cavia Bounties</h4>
							<div class="card-body">
								<table class="table table-hover table-borderless mb-0" id="EntratiLabSyndicate-table">
									<tr>
										<th class="mission">Fetching data...</th>
										<td class="challenge"></td>
										<td>55-60</td>
										<td>1000/1500</td>
									</tr>
									<tr>
										<th class="mission"></th>
										<td class="challenge"></td>
										<td>65-70</td>
										<td>2000/3000</td>
									</tr>
									<tr>
										<th class="mission"></th>
										<td class="challenge"></td>
										<td>75-80</td>
										<td>3000/4500</td>
									</tr>
									<tr>
										<th class="mission"></th>
										<td class="challenge"></td>
										<td>95-100</td>
										<td>4000/6000</td>
									</tr>
									<tr>
										<th class="mission"></th>
										<td class="challenge"></td>
										<td>115-120</td>
										<td>5000/7500</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<div class="col-xl-12 col-lg-6">
						<div class="card mb-3">
							<h4 class="card-header" id="ZarimanSyndicate-header">Holdfasts Bounties</h4>
							<div class="card-body">
								<table class="table table-hover table-borderless mb-0" id="ZarimanSyndicate-table">
									<tr>
										<th class="mission">Fetching data...</th>
										<td class="challenge"></td>
										<td>50-55</td>
										<td>1/2&nbsp;VQ</td>
									</tr>
									<tr>
										<th class="mission"></th>
										<td class="challenge"></td>
										<td>60-65</td>
										<td>2/3&nbsp;VQ</td>
									</tr>
									<tr>
										<th class="mission"></th>
										<td class="challenge"></td>
										<td>70-75</td>
										<td>3/5&nbsp;VQ</td>
									</tr>
									<tr>
										<th class="mission"></th>
										<td class="challenge"></td>
										<td>90-95</td>
										<td>4/6&nbsp;VQ</td>
									</tr>
									<tr>
										<th class="mission"></th>
										<td class="challenge"></td>
										<td>110-115</td>
										<td>5/8&nbsp;VQ</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="common.js"></script>
	<script>
		function formatExpiry(expiry)
		{
			expiry -= expiry % 1000; expiry += 1000; // normalise the ms so everything ticks at the same time
			const time = new Date().getTime();
			let delta = expiry - time;
			if (delta < 1_000)
			{
				return "Updating...";
			}
			let units = [];
			if (delta >= 3_600_000)
			{
				units.push(Math.trunc(delta / 3_600_000) + "h");
				delta %= 3_600_000;
			}
			if (delta >= 60_000)
			{
				units.push(Math.trunc(delta / 60_000) + "m");
				delta %= 60_000;
			}
			if (delta >= 1_000)
			{
				units.push(Math.trunc(delta / 1_000) + "s");
			}
			return units.join(" ");
		}

		function createExpiryBadge(expiry)
		{
			const span = document.createElement("span");
			span.setAttribute("data-timestamp", expiry);
			span.className = "badge text-bg-secondary";
			span.textContent = formatExpiry(expiry);
			return span;
		}

		function setDatum(name, value, expiry)
		{
			const elm = document.getElementById(name);
			elm.textContent = value + " ";
			elm.appendChild(createExpiryBadge(expiry));
		}

		function updateVallis()
		{
			const EPOCH = new Date("November 10, 2018 08:13:48 UTC").getTime();
			const time = new Date().getTime();
			const cycle = Math.trunc((time - EPOCH) / 1600000);
			const cycleStart = EPOCH + cycle * 1600000;
			const cycleEnd = cycleStart + 1600000;
			const cycleColdStart = cycleStart + 400000;
			window.refresh_vallis_at = time > cycleColdStart ? cycleEnd : cycleColdStart;
			setDatum("vallis", time > cycleColdStart ? "❄️ Cold" : "☀️ Warm", refresh_vallis_at);
		}
		updateVallis();

		function updateDayNightCycle()
		{
			const time = new Date().getTime();
			const cycleNightStart = bountyCycle.expiry - 3_000_000;
			window.refresh_day_night_cycle_at = time > cycleNightStart ? bountyCycle.expiry : cycleNightStart;
			setDatum("poe", time > cycleNightStart ? "🌑 Night" : "☀️ Day", refresh_day_night_cycle_at);
			setDatum("deimos", time > cycleNightStart ? "🌑 Vome" : "☀️ Fass", refresh_day_night_cycle_at);
		}

		const allyNames = {
			"/Lotus/Types/Gameplay/1999Wf/ProtoframeAllies/AmirAllyAgent": "Amir",
			"/Lotus/Types/Gameplay/1999Wf/ProtoframeAllies/AoiAllyAgent": "Aoi",
			"/Lotus/Types/Gameplay/1999Wf/ProtoframeAllies/ArthurAllyAgent": "Arthur",
			"/Lotus/Types/Gameplay/1999Wf/ProtoframeAllies/EleanorAllyAgent": "Eleanor",
			"/Lotus/Types/Gameplay/1999Wf/ProtoframeAllies/LettieAllyAgent": "Lettie",
			"/Lotus/Types/Gameplay/1999Wf/ProtoframeAllies/QuincyAllyAgent": "Quincy",
		};

		function updateBountyCycleLocalised()
		{
			setDatum("zariman", dict[bountyCycle.zarimanFaction == "FC_GRINEER" ? "/Lotus/Language/Game/Faction_GrineerUC" : "/Lotus/Language/Game/Faction_CorpusUC"], bountyCycle.expiry);
			setDatum("HexSyndicate-header", "Hex Bounties", bountyCycle.expiry);
			setDatum("EntratiLabSyndicate-header", "Cavia Bounties", bountyCycle.expiry);
			setDatum("ZarimanSyndicate-header", "Holdfasts Bounties", bountyCycle.expiry);
			for (const syndicateTag of ["HexSyndicate", "EntratiLabSyndicate", "ZarimanSyndicate"])
			{
				const rows = document.getElementById(syndicateTag + "-table").querySelectorAll("tr");
				for (let i = 0; i != bountyCycle.bounties[syndicateTag].length; ++i)
				{
					const node = ExportRegions[bountyCycle.bounties[syndicateTag][i].node];
					rows[i].querySelector(".mission").textContent = dict[node.name];
					if (!bountyCycle.bounties[syndicateTag][i].ally)
					{
						rows[i].querySelector(".mission").textContent += " (" + toTitleCase(dict[node.missionName]) + ")";
					}
					else
					{
						rows[i].querySelector(".ally").textContent = allyNames[bountyCycle.bounties[syndicateTag][i].ally];
					}
					const challenge = ExportChallenges[bountyCycle.bounties[syndicateTag][i].challenge];
					rows[i].querySelector(".challenge").textContent = dict[challenge.description].split("\r\n").pop().split("|COUNT|").join(challenge.requiredCount);
				}
			}
		}

		function updateBountyCycle()
		{
			window.refresh_bounty_cycle_at = undefined;
			fetch("https://oracle.browse.wf/bounty-cycle").then(res => res.json()).then(bountyCycle =>
			{
				window.bountyCycle = bountyCycle;
				updateDayNightCycle();
				updateBountyCycleLocalised();
				window.refresh_bounty_cycle_at = Math.max(new Date().getTime(), bountyCycle.expiry) + 3_000 + Math.random() * 10_000; // world state takes a bit to roll over plus network congestion and whatever
			});
		}

		function updateNames()
		{
			document.getElementById("poe-name").textContent = dict["/Lotus/Language/Locations/EidolonPlains"];
			document.getElementById("vallis-name").textContent = dict["/Lotus/Language/Locations/VenusLandscape"];
			document.getElementById("deimos-name").textContent = dict["/Lotus/Language/InfestedMicroplanet/SolarMapDeimosLandscapeName"];
			document.getElementById("zariman-name").textContent = dict["/Lotus/Language/Zariman/ZarimanRegionName"];
		}

		Promise.all([
			getDictPromise(),
			fetch("https://browse.wf/warframe-public-export-plus/ExportRegions.json").then(res => res.json()),
			fetch("https://browse.wf/warframe-public-export-plus/ExportChallenges.json").then(res => res.json())
		]).then(([dict, ExportRegions, ExportChallenges]) =>
		{
			window.dict = dict;
			window.ExportRegions = ExportRegions;
			window.ExportChallenges = ExportChallenges;
			updateNames();
			updateBountyCycle();
			onLanguageUpdate = function()
			{
				updateNames();
				updateBountyCycleLocalised();
			};
		});

		setInterval(function()
		{
			for (const elm of document.querySelectorAll(".badge[data-timestamp]"))
			{
				elm.textContent = formatExpiry(elm.getAttribute("data-timestamp"));
			}
		}, 100);

		setInterval(function()
		{
			if (new Date().getTime() >= window.refresh_vallis_at)
			{
				updateVallis();
			}
			if (window.refresh_day_night_cycle_at && new Date().getTime() >= window.refresh_day_night_cycle_at)
			{
				updateDayNightCycle();
			}
			if (window.refresh_bounty_cycle_at && new Date().getTime() >= window.refresh_bounty_cycle_at)
			{
				updateBountyCycle();
			}
		}, 500);
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
