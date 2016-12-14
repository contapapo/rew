
SELECT cpt.ean1 'EAN1 (std)',cpt.nom 'Nom',cpt.site 'Site',cpt.sn 'SNR',cpt.S00 'Type', (((@day_nbr) * 96) - cnt)/96 ' Gap(jours)',
date_format(s.Max_Date,'%d-%m-%Y %H:%i:%s') 'dernière Val.',
date_format(@FROM,'%d-%m-%Y %H:%i:%s') 'Period (FROM)',
date_format(@TO,'%d-%m-%Y %H:%i:%s')'Period (TO)'
FROM regie.compteur cpt
LEFT JOIN (SELECT site,COUNT(*) as cnt ,max(std.dls) as Max_Date FROM regie.std std WHERE std.dls BETWEEN @from AND @to  GROUP BY site) s
USING (site)
WHERE 
(
s.cnt < ((@day_nbr) * 96) 
or 
ISNULL(s.cnt)
)

AND

 cpt.S00 in ('A01','INF','INF-PIBW','XEP3') and cpt.site not in('%I')
 
 

order by cpt.s00 asc,cpt.site desc;


