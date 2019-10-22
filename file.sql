delimeter
create function salary_avg(company_name varchar(50))
returns decimal(14,2)
begin
     declare avg_salary decimal(14,2)
     select avg(salary) into avg_salary
     from works
     where works.company_name = company_name;
     return avg_salary;
 end;
 delimeter
 select a.company_name
 from (select avg(salary) as avgSalary, company_name
 	from works
 	group by company_name) as a
 where a.avgSalary < salary_avg('First  Bank Corperation')
 group by company_name;