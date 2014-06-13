<?php

/*
__PocketMine Plugin__
name=DrinkBucket
description=Drink Bucket Water to Heal (1 heart)
version=1.0
author=BlinkSun,swagboy47
class=Drink
apiversion=11,12
*/

class DrinkBucket implements Plugin
{
	private $api;

	public function __construct(ServerAPI $api, $server = false) {
		$this->api = $api;
	}

	public function init() {
		$this->api->addHandler("player.action", array($this, "eventHandle"), 50);
	}

	public function eventHandle($data, $event, $dmg, $player) {
		switch ($event) {
			case "player.action":
				$player = $data["player"];
				$item = $player->getSlot($player->slot);
				if($item->getID() === BUCKET and $item->getMetaData() === WATER and $player->entity->getHealth() < 20) {
					$player->entity->heal(2, "drinking");
					$player->setSlot($player->slot, BlockAPI::getItem(BUCKET, AIR, 1));
				}
				break;
				
					case "player.action":
				if($item->getID() === BUCKET and $item->getMetaData() === LAVA and $player->entity->getHealth() =< 20) {
		                      $player->entity->fire(10*10, "drinking");
					$player->setSlot($player->slot, BlockAPI::getItem(BUCKET, AIR, 1));
				}
				break;
				
			
	}
	}

	public function __destruct() {
	}
}
