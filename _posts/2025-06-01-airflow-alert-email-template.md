---
title: "📬 Airflow Failure Alert Templates"
date: 2025-06-23
layout: bootstrap-post
tags: [airflow, alerting, email, devops, observability]
---

> Improve your Airflow failure emails with simple templates and customizable callbacks—engineer-friendly and easy to extend.
[GitHub repo](https://github.com/soyelherein/airflow-alert-template)

---

## 🚩 Why Customize Airflow Alerts?

Default Airflow alert emails are basic and lack key context. With minimal setup, you can:

- Improve visual clarity  
- Add metadata (DAG tags, retries, links, owners)  
- Include recovery tips or failure history  

---

## 🧰 Option 1: Simple Template-Based Alerts

This approach uses Airflow’s built-in support for custom subject and HTML email templates.

### Files

- [`email_body_template.html`](https://github.com/soyelherein/airflow-alert-template/blob/main/email_body_template.html) – styled jinja-powered HTML alert body  
- [`email_subject_template.html`](https://github.com/soyelherein/airflow-alert-template/blob/main/email_subject_template.html) – dynamic subject line  

### Configuration

In `airflow.cfg`:

<pre><code>
[email]
html_content_template = /path/to/email_body_template.html
subject_template = /path/to/email_subject_template.html
</code></pre>

Or as environment variables:

<pre><code>
AIRFLOW__EMAIL__HTML_CONTENT_TEMPLATE=/path/to/email_body_template.html  
AIRFLOW__EMAIL__SUBJECT_TEMPLATE=/path/to/email_subject_template.html
</code></pre>

### Benefits

- Clean visual layout  
- Rich metadata (task ID, DAG ID, links, retries)  
- No code changes  

---

## ⚙️ Output (Basic Template)

On task failure, it uses this subject template:
{% raw %}
<pre><code>{% if task_instance.try_number > task.retries %}
🚨 [Airflow Alert] FINAL FAILURE ❌ — {{ dag.dag_id }}.{{ task.task_id }} | Exec: {{ execution_date }}
{% else %}
⚠️ [Airflow Alert] RETRY {{ task_instance.try_number }}/{{ task.retries + 1 }} — {{ dag.dag_id }}.{{ task.task_id }} | Exec: {{ execution_date }}
{% endif %}</code></pre>
{% endraw %}
---

![Basic failure Image](</img/airflow template/basic failure alert.png>)

---

## 🧠 Option 2: Advanced Alerts with Python Callback

For more control and richer alerts (e.g., run history, recovery tips), use a custom `on_failure_callback`.

### Files

- [`dags/utils/email_body_template_callback.html`](https://github.com/soyelherein/airflow-alert-template/blob/main/dags/utils/email_body_template_callback.html) – advanced HTML template  
- [`dags/utils/email_callback.py`](https://github.com/soyelherein/airflow-alert-template/blob/main/dags/utils/email_callback.py) – Python callback that renders and sends the email  
- [`dags/failure_test_dag_callback.py`](https://github.com/soyelherein/airflow-alert-template/blob/main/dags/failure_test_dag_callback.py) – sample DAG using the callback

### Highlights

- Injects DAG/task metadata dynamically  
- Includes last 5 DAG run statuses  
- Optional recovery guidance  
- Flexible to extend (Slack, PagerDuty, etc.)

---

## 🧪 Output

Alerts look like this when powered by the custom callback:

![Email generated with custom callback](</img/airflow template/callback_template_email.png>)

---

## ✅ Conclusion

Clear and contextual alerts aren’t just a “nice-to-have” — they’re essential for fast recovery, reliable systems, and a happier on-call experience.

If you're setting up alerts for an engineering team:

- Start with the simple HTML templates for an instant visual upgrade  
- Move to a custom callback when you need logic, historical insight, or extensibility  
- Both methods are battle-tested and production-friendly

Want to try it out?

→ [Explore the GitHub repo](https://github.com/soyelherein/airflow-alert-template)  
→ Contributions and suggestions welcome!

---
