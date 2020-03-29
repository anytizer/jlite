import uuid

class provider:
    def __init__(self):
        pass

    def id():
        return str(uuid.uuid4()).upper()
        
    
    def setup():
        setup = {
            # entity = [name, table, pk]
            "departments": ["Departments", "company_departments", "department_id"],
            "employees": ["Employees", "company_employees", "employee_id"],
            "schedules": ["Schedules", "company_schedules", "schedule_id",],
            "payroll": ["Payroll", "company_payrolls", "payroll_id",],
        }
        return setup
