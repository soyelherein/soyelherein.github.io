---
title: "📬 Standardizing Airflow Failure Alerts with HTML Templates"
date: 2025-06-01
layout:  bootstrap-post
tags: [airflow, monitoring, alerting, email, devops]
---

> TL;DR: Learn how to create clean, rich, and actionable Airflow failure alert emails using custom HTML templates and metadata like DAG tags, retries, priority, and run history.  
> → [View the template on GitHub](https://github.com/soyelherein/airflow-alert-template)

---

## 🧩 Problem

Out-of-the-box Airflow alert emails are minimal. Developers lack context like:
- Why the task failed  
- How many times it failed before  
- Where to view logs or UI links  
- Who owns the DAG  

---

## ✅ Solution: Custom HTML Alert Template

We created a standardized HTML email template that includes:

- DAG ID, task ID, priority, owner  
- Retry count and failure history  
- Links to Logs, Graph, Grid, and Task UI views  
- DAG Tags for better filtering  
- Last 5 runs history with execution time and status  

🔗 [View the full HTML template](https://github.com/soyelherein/airflow-alert-template/blob/main/email_failure_template.html)

---

## ⚙️ How to Configure

In your `airflow.cfg` or environment variables:

```
[email]
html_content_template = /path/to/email_failure_template.html
subject_template = 🚨 [Airflow Alert] {{ dag.dag_id }} failed ❌
```


---

## 🧪 Test DAG

Here's a sample DAG to trigger failure and test alerting:

```python
from airflow import DAG
from airflow.operators.python import PythonOperator
from datetime import datetime

def fail():
    raise Exception("Triggering failure for alert test.")

with DAG("test_failure_alert", start_date=datetime(2023, 1, 1), schedule_interval=None, catchup=False) as dag:
    PythonOperator(
        task_id="failing_task",
        python_callable=fail,
        email_on_failure=True,
        email=["you@example.com"],
    )
```

💬 Final Thoughts
Standardizing alerts gives teams better insight, faster debugging, and improved on-call experiences. This setup helps both developers and business stakeholders.

👉 Repo: soyelherein/airflow-alert-template
🌐 Live alert output preview: available in the README

Have ideas or want to contribute? Open an issue or PR! 🙌