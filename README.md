# SchraubermarktMage2

Just a small addon to make changes which cannot not be made by the admin frontend.

## need to modify table sales_order_aggregated_created
 ALTER TABLE sales_order_aggregated_created ADD COLUMN total_cost_amount decimal(20,4) DEFAULT 0 AFTER total_revenue_amount;
