<?php

namespace CustomAreas;

use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;

class EventListener implements Listener{

    private $plugin;

    public function __construct(Main $plugin){
        $this->plugin = $plugin;
    }

    public function onHit(EntityDamageEvent $event){
            foreach($this->plugin->areas as $area){
                if($area->isInside($event->getBlock()) and !$area->canBuild($event->getPlayer())){
                    $event->setCancelled();
                }
            }
    }

}
