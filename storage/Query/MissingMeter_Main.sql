set @day_nbr = 30;
set @From = date_format(date_sub(curdate(),INTERVAL (30+1) DAY),'%Y%m%d001500');
set @to = concat(curdate()-1,'000000');

SELECT cpt.ean1 'EAN1 (std)',cpt.nom 'Nom',cpt.site 'Site',cpt.sn 'SNR',cpt.S00 'Type'
FROM regie.compteur cpt

LEFT JOIN (SELECT site,COUNT(*) as cnt ,max(std.dls) as Max_Date FROM regie.std std WHERE std.dls BETWEEN @from AND @to  GROUP BY site) s
USING (site)
WHERE (
s.cnt < ((@day_nbr) * 96) 
or 
ISNULL(s.cnt))
AND
cpt.S00 in ('A01','INF','INF-PIBW','XEP3') and cpt.site not in('%I')
order by cpt.s00 asc,cpt.site desc;


