#select subject_guid,eue.name,eue.username 
select sum(freqs) as summation from (
select count(*) as freqs
from elgg_river as er 
where er.subject_guid IN 
(
SELECT guid_two
FROM `elgg_entity_relationships` 
WHERE (relationship='friend' AND  guid_one=2)
)
group by er.subject_guid
order by freqs desc
) AS Table1