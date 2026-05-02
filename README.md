# Exam Management Plugin

A complete Exam Management Plugin for WordPress, built on custom post types.

## Features

| # | Feature | Status |
|---|---------|--------|
| 1 | **Admin Term Creation** — `em_term` taxonomy with start/end dates | ✅ |
| 2 | **Admin Exam Creation** — start/end datetime, subject, term assignment | ✅ |
| 3 | **Result Creation** — select exam → enter marks per student (0–100) | ✅ |
| 4 | **AJAX Exam List** — paginated, ordered current → upcoming → past | ✅ |
| 5 | **Top Students Shortcode** — `[em_top_students]` per term, latest first | ✅ |
| 6 | **Bulk CSV Import** — import student marks via CSV file | ✅ |
| 7 | **Student Statistics Report** — total/avg marks per term, PDF export | ✅ |

---

## Installation

1. Upload the `mt-exam` folder to `/wp-content/plugins/`
2. Activate via **Plugins → Installed Plugins**
3. Navigate to **MT Exam** in the WordPress admin menu

---

## Custom Post Types

| Post Type | Slug | Description |
|-----------|------|-------------|
| Student | `em_student` | Enrolled students (name, roll ID, email) |
| Subject | `em_subject` | Academic subjects |
| Exam | `em_exam` | Exams with start/end datetime, subject, term |
| Result | `em_result` | Student marks per exam |

### Taxonomy
- **Academic Terms** (`em_term`) — attached to `em_exam`, with start and end date metadata.

---

## Usage Guide

### 1. Create Academic Terms
Go to **MT Exam → Academic Terms → Add New Term**
- Enter term name (e.g. `T1 2025-26`)
- Set Start Date and End Date

### 2. Add Subjects
Go to **MT Exam → Subjects → Add New**
- Enter the subject name (e.g. `Mathematics`, `Physics`)

### 3. Add Students
Go to **MT Exam → Students → Add New**
- Enter student full name as the post title
- Optionally enter Roll/ID and email

### 4. Create Exams
Go to **MT Exam → Exams → Add New**
- Enter exam name as post title
- Set start & end datetime
- Select subject
- Assign an Academic Term (right sidebar box)

### 5. Enter Results
Go to **MT Exam → Results → Add New**
- Select an exam from the dropdown
- Enter marks (0–100) for each student

### 6. Import Results via CSV
Go to **MT Exam → Import CSV**
- Download the sample CSV to see the expected format
- Upload your CSV with columns: `student_id`, `exam_id`, `marks`
- Student ID and Exam ID = WordPress Post IDs (visible in the import page reference table)

### 7. View Student Report
Go to **MT Exam → Student Report**
- See all students, total marks per term, averages
- Click **Export as PDF** for a print-ready report

### 8. Top Students Shortcode
Add `[em_top_students]` to any page or post to display top 3 students per term.

