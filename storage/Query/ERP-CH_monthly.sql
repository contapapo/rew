SELECT cpt.ean1, std.site, cpt.s00, EXTRACT(YEAR_month FROM DATE_SUB(std.dls, INTERVAL 1 SECOND)) mois,
ROUND(SUM(std.ap)/1000, 0) ap
FROM regie.std std, regie.compteur cpt
WHERE cpt.site = std.site and (left(cpt.s00,3) in ('A01','EP','I01','ECH','INF'))
and EXTRACT(YEAR_month FROM DATE_SUB(std.dls, INTERVAL 1 SECOND)) = 201607
GROUP BY std.site, EXTRACT(YEAR_month FROM DATE_SUB(std.dls, INTERVAL 1 SECOND));