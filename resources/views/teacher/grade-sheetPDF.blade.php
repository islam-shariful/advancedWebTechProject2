<!DOCTYPE html>
<html class="no-js" lang="">
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Teacher | Exam Grade</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  </head>

  <body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>

        <div class="dashboard-content-one">
          <!-- Grade Area Start Here -->
          <div class="row">
            <div class="col-8-xxxl col-12">
              <div class="card height-auto">
                <div class="card-body">


                  <div class="table-responsive">
                    <table method="post" class="table display data-table text-nowrap" border='2px'>
                      <thead>
                        <tr>
                          <th>
                              <label class="form-check-label">Grade ID</label>
                          </th>
                          <th>Student ID</th>
                          <th>Subject ID</th>
                          <th>Class ID</th>
                          <th>Section ID</th>
                          <th>Final Grade</th>
                        </tr>
                      </thead>
                      <tbody>
                        @for($i=0; $i != count($gradeList); $i++)
                        <tr>
                          </td>
                          <td>{{ $gradeList[$i]->grade_id }}</td>
                          <td>{{ $gradeList[$i]->student_id }}</td>
                          <td>{{ $gradeList[$i]->subject_id }}</td>
                          <td>{{ $gradeList[$i]->class_id }}</td>
                          <td>{{ $gradeList[$i]->section_id }}</td>
                          <td>{{ $gradeList[$i]->finalgrade }}</td>
                        </tr>
                        @endfor
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Grade Area End Here -->

          <footer class="footer-wrap-layout1"></footer>
        </div>

  </body>
</html>
