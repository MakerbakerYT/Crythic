<?php

declare(strict_types = 1);

namespace core\mask\masks;

use libs\utils\Utils;
use pocketmine\entity\Effect;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class ZombieMask extends MaskAPI{

    /**
     * @return string
     */
    public function getName(): string{
        return "Zombie Mask";
    }

    /**
     * @return int
     */
    public function getDamage(): int{
        return 2;
    }

    /**
     * @return array
     */
    public function getLore(): array{
        return [
            TextFormat::BOLD . TextFormat::GREEN . "\nRARITY",
            TextFormat::BOLD . TextFormat::GREEN . " * " . TextFormat::RESET . "Common",
            "",
            TextFormat::BOLD . TextFormat::GREEN . "ABILITY",
            "§r§fEat their flesh\nand become one!",
            "",
            TextFormat::BOLD . TextFormat::GREEN . "EFFECT",
            TextFormat::BOLD . TextFormat::GREEN . " * " . TextFormat::RESET . "Speed I",
            TextFormat::BOLD . TextFormat::GREEN . " * " . TextFormat::RESET . "Haste II",
            TextFormat::BOLD . TextFormat::GREEN . " * " . TextFormat::RESET . "Health Boost",
            TextFormat::BOLD . TextFormat::GREEN . " * " . TextFormat::RESET . "Night Vision",
        ];
    }

    /**
     * @param int $currentTick
     */
    public function tick(int $currentTick): void{
        foreach(Server::getInstance()->getOnlinePlayers() as $p){
            if($this->hasMask($p)){
                Utils::addEffect($p, Effect::SPEED, 6);
                Utils::addEffect($p, Effect::HASTE, 6, 2);
                Utils::addEffect($p, Effect::NAUSEA, 6);
                Utils::addEffect($p, Effect::NIGHT_VISION, 15);
                Utils::addEffect($p, Effect::HEALTH_BOOST, 6);
            }
        }
    }
}