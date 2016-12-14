SELECT cpt.ean1, std.site, DATE(DATE_SUB(std.dls, INTERVAL 1 SECOND)) jour,
ROUND(SUM(std.ap/4), 0) kwh
FROM regie.std std, regie.compteur cpt
WHERE cpt.site = std.site and std.dls>20160701000000 and std.site like 'MOV%'
GROUP BY std.site, DATE(DATE_SUB(std.dls, INTERVAL 1 SECOND));