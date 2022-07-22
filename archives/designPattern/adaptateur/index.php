<?php
include('adaptateur.php');

$xml = '<?xml version="1.0" encoding="UTF-8" ?>
            <root>
                <organized>
                    <leather>drive</leather>
                    <golden>everything</golden>
                    <blanket>lamp</blanket>
                    <arrange>-298007513.973084</arrange>
                    <moving>
                        <rhyme>-1936525536</rhyme>
                        <won>pick</won>
                        <waste>592108127.8297167</waste>
                        <log>higher</log>
                        <loss>1710029597</loss>
                        <discovery>how</discovery>
                    </moving>
                    <war>-943333685</war>
                </organized>
                <row>magic</row>
                <handle>2109060592.728489</handle>
                <bow>1647002574.1975274</bow>
                <instance>416084781.7564597</instance>
                <claws>shot</claws>
            </root>';


echo Adaptateur::xmlToJson($xml);
