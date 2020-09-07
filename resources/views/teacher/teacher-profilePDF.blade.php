<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
  </head>
  <body>
    <div>
      <div style="margin-left: 40%; font-size: small;">
        <h3>Teacher's Information</h3>
      </div>
      <!-- Student Table Area Start Here -->
      <div class="card height-auto">
        <div class="card-body">
          <div class="single-info-details">
            <div class="item-img">
              <img src="/assets/teacher/img/figure/teacher.jpg" alt="teacher" />
            </div>
            <div class="item-content">
              <div class="info-table table-responsive">
                <table class="table text-nowrap">
                  <tbody>
                    <tr>
                      <td>ID:</td>
                      <td class="font-medium text-dark-medium">
                        {{ $teacherInfo->teacher_id }}
                      </td>
                    </tr>
                    <tr>
                      <td>Name:</td>
                      <td class="font-medium text-dark-medium">
                        {{ $teacherInfo->teachername }}
                      </td>
                    </tr>
                    <tr>
                      <td>E-mail:</td>
                      <td class="font-medium text-dark-medium">
                        {{ $teacherInfo->teacheremail }}
                      </td>
                    </tr>
                    <tr>
                      <td>Designation:</td>
                      <td class="font-medium text-dark-medium">
                        {{ $teacherInfo->teacherdesignation }}
                      </td>
                    </tr>
                    <tr>
                      <td>Department:</td>
                      <td class="font-medium text-dark-medium">
                        {{ $teacherInfo->teacherdepartment }}
                      </td>
                    </tr>
                    <tr>
                      <td>Subject Id:</td>
                      <td class="font-medium text-dark-medium">
                        {{ $teacherInfo->subject_id }}
                      </td>
                    </tr>
                    <tr>
                      <td>Address:</td>
                      <td class="font-medium text-dark-medium">
                        {{ $teacherInfo->teacheraddress }}
                      </td>
                    </tr>
                    <tr>
                      <td>Date of Birth:</td>
                      <td class="font-medium text-dark-medium">
                        {{ $teacherInfo->teacherdob }}
                      </td>
                    </tr>
                    <tr>
                      <td>Gender:</td>
                      <td class="font-medium text-dark-medium">
                        {{ $teacherInfo->teachergender }}
                      </td>
                    </tr>
                    <tr>
                      <td>Religion:</td>
                      <td class="font-medium text-dark-medium">
                        {{ $teacherInfo->teacherreligion }}
                      </td>
                    </tr>
                    <tr>
                      <td>Joining Date:</td>
                      <td class="font-medium text-dark-medium">
                        {{ $teacherInfo->teacherjoiningdate }}
                      </td>
                    </tr>
                    <tr>
                      <td>Father Name:</td>
                      <td class="font-medium text-dark-medium">
                        {{ $teacherInfo->teacherfathername }}
                      </td>
                    </tr>
                    <tr>
                      <td>Mother Name:</td>
                      <td class="font-medium text-dark-medium">
                        {{ $teacherInfo->teachermothername }}
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Student Table Area End Here -->
    </div>
  </body>
</html>
