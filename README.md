# TT-18JAN21
Simple implementation of T/T multi-database setup, using livewire to fetch "tenant" models without any automatic identification of the tenant.
I.E. Accessing tenant's data from an administrator panel.

Stream: https://www.twitch.tv/videos/878566649

# Models
1) `Company` This model is our "Tenant"; every company will get their own database.
2) `Post` This model belongs to the "Tenant". It is stored on the "tenant" database.

# Listeners & New Providers for Tenancy
Everything in the `app\Tenancy` folder is directly related to the setup of Tenancy.

# Livewire
I've never used livewire before; it seems simple enough. With that said the 4 key files are as follows:
1) `app\Http\Livewire\Companies` This handles the listing of companies
2) `resources\views\livewire\companies` This is displaying the list of companies, and the link (displaying a button) to view the posts for a company
1) `app\Http\Livewire\Posts` This handles the listing of posts for a specific company
2) `resources\views\livewire\posts` This is displaying the list of posts for a company, and includes a select to choose what tenant to be displayed


# Notes:
This setup uses 2 different database users excluding any created for tenants. As such there are two mysql connections; and the admin connection is set in the `Company` model.

`rbs_user` only has access to the `rbs_database`, and has no additional permissions outside that database.
`rbs_admin` is an administrator, that can create additional users, grant privilages, and access any database.

```sql
CREATE USER 'rbs_admin'@'%' IDENTIFIED BY 'rbs_admin_password';
GRANT ALL PRIVILEGES ON * . * TO 'rbs_admin'@'%' WITH GRANT OPTION;
FLUSH PRIVILEGES;

CREATE DATABASE rbs_database;
CREATE USER 'rbs_user'@'%' IDENTIFIED BY 'rbs_user_password';
GRANT ALL PRIVILEGES ON rbs_database . * TO 'rbs_user'@'%';
FLUSH PRIVILEGES;
```

## Warnings:
This was simply done as a POC to attempt to find any bugs located in the T/T flow. Do not use this code in production, and only as a reference.
